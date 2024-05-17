<?php
namespace App\Traits;
use Illuminate\Http\UploadedFile;
trait FileUploadTrait
{
    public function uploadSingleFile(UploadedFile $file, $folder)
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);
        return $filename;
    }

    public function uploadMultipleFiles(array $files, $folder)
    {
        $uploadedFiles = [];
        foreach ($files as $file) {
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            $uploadedFiles[] = $filename;
        }

        return $uploadedFiles;
    }
}
