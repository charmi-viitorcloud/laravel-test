<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body>
    @include('includes.header')
    <div class='container-fluid page-body-wrapper'>


        @include('includes.sidebar')
        @yield('content')
    </div>

    @include('includes.footer')
</body>

</html>
