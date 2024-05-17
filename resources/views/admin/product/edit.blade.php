@extends('layouts.admin')
<style>
    img {
        max-width: 150px;
        max-height: 150px;
    }

    .preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .preview-item {
        position: relative;
        max-width: 150px;
        max-height: 150px;
    }
</style>
@section('brandcrume')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Product</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mx-auto">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('product.update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="card-body">
                        <div class="row py-3">
                            <div class="col-md-6">
                                <h4 class="card-title">Product</h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end"><a class="btn btn-success"
                                    href="{{ route('product') }}">
                                    Products</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ old('name') ?? $product->name }}"
                                    class="form-control  @error('name')is-invalid  @enderror" id="name"
                                    placeholder="Product Name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-3 text-right control-label col-form-label">Category
                            </label>
                            <div class="col-sm-9">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->id ? 'selected' : '' }}>{{ $category->name }}
                                        </option>

                                    @empty
                                        <option value="">Not Found</option>
                                    @endforelse
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subcategory_id"
                                class="col-sm-3 text-right control-label col-form-label">Subcategory:</label>
                            <div class="col-sm-9">
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>

                        </div>
                         <div id="sub_subcategory_container">
                            
                        </div>


                        <div class="form-group row">
                            <label for="image" class="col-sm-3 text-right control-label col-form-label">Select
                                Images:</label>
                            <div class="col-sm-9">
                                <input type="file" id="image" name="image[]" class="form-control" multiple
                                    accept="image/*">
                                <div id="imagePreviewContainer" class="preview-container"></div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="short_desc" class="col-sm-3 text-right control-label col-form-label">
                                Short Description </label>
                            <div class="col-sm-9">

                                <textarea name="short_desc" id="short_desc" cols="30" rows="2" class="form-control">{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summernote" class="col-sm-3 text-right control-label col-form-label">
                                Description </label>
                            <div class="col-sm-9">
                                <textarea name="descs" id="summernote">{{ $product->description }}</textarea>
                            </div>
                        </div>



                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Descriptions',
                tabsize: 2,
                height: 300
            });
        });
    </script>
    <script>
        let fileInput = document.getElementById('image');

        function previewImages(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('imagePreviewContainer');
            previewContainer.innerHTML = ''; // Clear previous previews

            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;


                    const previewDiv = document.createElement('div');
                    previewDiv.classList.add('preview-item');
                    previewDiv.appendChild(imgElement);
                    previewContainer.appendChild(previewDiv);


                };
                reader.readAsDataURL(file);
            }
        }

        fileInput.addEventListener('change', previewImages);

        function updateFileInput(removedFile) {
            const files = fileInput.files;
            const newFiles = [];
            for (const file of files) {
                if (file !== removedFile) {
                    newFiles.push(file);
                }
            }

            const newFileInput = document.createElement('input');
            newFileInput.type = 'file';
            newFileInput.id = 'image';
            newFileInput.accept = 'image/*';
            newFileInput.multiple = true;

            // Add files to the new file input
            newFiles.forEach(file => {
                const newFile = new File([file], file.name, {
                    type: file.type
                });
                newFileInput.files.add(newFile);
            });

            // Replace old file input with the new one
            fileInput.parentNode.replaceChild(newFileInput, fileInput);
            fileInput = newFileInput; // Update reference to the new file input
        }
    </script>

    <script>
        // Fetch and populate subcategories based on the selected category
        document.getElementById('category_id').addEventListener('change', function() {
            const categoryId = this.value;
            const subcategoryDropdown = document.getElementById('subcategory_id');

            fetch(`/admin/categories/${categoryId}/subcategories`)
                .then(response => response.json())
                .then(data => {
                    subcategoryDropdown.innerHTML =
                        '<option value="">Select Subcategory</option>'; // Clear previous options
                    data.forEach(subcategory => {
                        subcategoryDropdown.innerHTML +=
                            `<option value="${subcategory.id}">${subcategory.name}</option>`;
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
    
       
    <script>
          function createSelectWithOptions(options, parentId) {
        const select = document.createElement('select');
        select.id = parentId + '_sub_subcategory_id';
        select.name = 'sub_subcategory_id';
        select.classList.add('form-control');
        select.innerHTML = '<option value="">Select Sub-subcategory</option>'; // Initial option
        
        options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.textContent = option.name;
            select.appendChild(optionElement);
        });

        return select;
    }
    
    
    document.getElementById('subcategory_id').addEventListener('change', function() {
        const subcategoryId = this.value;
        const subSubcategoryContainer = document.getElementById('sub_subcategory_container');

        if (subcategoryId !== '') {
            fetch(`/admin/subcategories/${subcategoryId}/subsubcategories`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const select = createSelectWithOptions(data, subcategoryId);
                        subSubcategoryContainer.innerHTML = ''; // Clear previous div
                        const divFormGroup = document.createElement('div');
                        divFormGroup.classList.add('form-group', 'row');
                        divFormGroup.innerHTML = `
                            <label for="sub_subcategory_id" class="col-sm-3 text-right control-label col-form-label">Sub Subcategory:</label>
                            <div class="col-sm-9">
                                ${select.outerHTML}
                            </div>
                        `;
                        subSubcategoryContainer.appendChild(divFormGroup);
                    } else {
                        subSubcategoryContainer.innerHTML = ''; // Clear div if no sub-subcategories
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            subSubcategoryContainer.innerHTML = ''; // Clear div if no subcategory selected
        }
    });
    </script>
@endsection
