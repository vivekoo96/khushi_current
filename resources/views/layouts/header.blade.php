   <header class="topbar" data-navbarbg="skin5">
       <nav class="navbar top-navbar navbar-expand-md navbar-dark">
           <div class="navbar-header" data-logobg="skin5">
               <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                       class="ti-menu ti-close"></i></a>
               <a class="navbar-brand" href="index.html">
                   <b class="logo-icon p-l-10">
                       <img src="{{ asset('admin/img/logo.png') }}" alt="homepage" class="light-logo" width="90" />

                   </b>
               </a>
               <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                   aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
           </div>
           <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

               <ul class="navbar-nav float-left mr-auto">
                   <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                           href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
                               class="mdi mdi-menu font-24"></i></a></li>

                   <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                           href="javascript:void(0)"><i class="ti-search"></i></a>
                       <form class="app-search position-absolute">
                           <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                               class="srh-btn"><i class="ti-close"></i></a>
                       </form>
                   </li>
               </ul>

               <ul class="navbar-nav float-right">

                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                               src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="user"
                               class="rounded-circle" width="31"></a>
                       <div class="dropdown-menu dropdown-menu-right user-dd animated">
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>


                           <a class="dropdown-item" href="javascript:void(0)"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                   class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>

                       </div>
                   </li>
                   <!-- ============================================================== -->
                   <!-- User profile and search -->
                   <!-- ============================================================== -->
               </ul>
           </div>
       </nav>
   </header>
