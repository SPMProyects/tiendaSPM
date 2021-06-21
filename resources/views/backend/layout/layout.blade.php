<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('backend.layout.head')
    @yield('styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('backend.layout.header')

        @include('backend.layout.aside')

        <div class="content-wrapper">
            
            @yield('content')

        </div>

        @include('backend.layout.footer')
    
    </div>

    @include('backend.layout.scripts')
    @yield('scripts')

</body>
</html>
