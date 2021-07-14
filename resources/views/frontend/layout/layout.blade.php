<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('frontend.layout.head')
    @include('frontend.layout.styles')
    @yield('styles')

</head>
<body>

    @include('frontend.layout.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.layout.footer')
    

    @include('frontend.layout.scripts')
    @yield('scripts')

</body>
</html>
