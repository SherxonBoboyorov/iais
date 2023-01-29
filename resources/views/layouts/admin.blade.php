<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
    @yield('custom_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('homeAdmin') }}" class="brand-link">
            <style>
                .brand-link {
                    background-color: #007bff;
                }
            </style>
            <span class="brand-text font-weight-light" style="margin-left: 90px">Iais</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Sliders
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('slider.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            About us
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('aboutus.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('aboutus.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                      {{-- start  --}}
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Leadership
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('aboutperson.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('aboutperson.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Leadership  people
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('person.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('person.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                       {{-- start  --}}
                       <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            What We Do
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('aboutwhat.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('aboutwhat.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li> --}}
                        </ul>
                     </li>
                    {{-- end  --}}

                      {{-- start  --}}
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            What We Stand For
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('aboutmission.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('aboutmission.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li> --}}
                        </ul>
                     </li>
                    {{-- end  --}}



                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Careers and Internships
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('career.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('career.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                             Videos
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('video.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('video.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                             News
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('article.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('article.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                     {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                             Centers topic and region
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('centerfilter.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('centerfilter.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                             Centers
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('centerabout.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('centerabout.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Head of Center
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('director.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('director.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Experts
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('expertpeople.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('expertpeople.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}


                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Outputs category
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('outputcategory.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('outputcategory.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Outputs
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('outputnew.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('outputnew.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                       <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Projects
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('projectnew.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projectnew.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Project document
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('projectdocument.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projectdocument.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                     </li>
                    {{-- end  --}}


                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Support Our Donors
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('supportabout.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('supportabout.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li> --}}
                        </ul>
                     </li>
                    {{-- end  --}}

                     {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Support Donate
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('donateabout.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('donateabout.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li> --}}
                        </ul>
                     </li>
                    {{-- end  --}}


                    {{-- start  --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Our contact
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ourcontact.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('ourcontact.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li> --}}
                        </ul>
                     </li>
                {{-- end  --}}

                    {{-- start  --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>
                                Contacts of centers
                                 <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('contactcenter.index') }}" class="nav-link">
                                   <p>All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contactcenter.create') }}" class="nav-link">
                                   <p>Add</p>
                                </a>
                            </li>
                            </ul>
                         </li>
                    {{-- end  --}}

                    {{-- start  --}}
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>
                                Options
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('options.index') }}" class="nav-link">
                                    <p>All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('options.create') }}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                     </li>
                    {{-- end  --}}

                    {{-- start  --}}
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>
                                Events
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('eventproduct.index') }}" class="nav-link">
                                    <p>All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('eventproduct.create') }}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                     </li>
                   {{-- end  --}}

                </ul>
            </nav>
        </div>
    </aside>


    <div class="content-wrapper">
        @yield('content')
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/admin/dist/js/adminlte.js"></script>
<script src="/admin/dist/js/demo.js"></script>
<script src="/admin/dist/js/pages/dashboard.js"></script>

<!-- App js -->
<script src="{{ asset('admin/js/app.js') }}"></script>
@yield('custom_js')
</body>
</html>
