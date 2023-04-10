@include('partials._header')
<body class="mb-48">
 <x-flash-message />

@include('partials._nav')

@if (Request::url() == route('homepage'))
<!-- Hero -->
<x-hero />
<!-- End Hero -->
@else

@endif

<!-- Hero -->

<!-- End Hero -->
<main>

    @if (Request::url() == route('homepage'))
<!-- Search -->
    @include('partials._search')
<!-- End Search -->
@else

@endif
    @yield('content')

</main>
<!-- Start Footer -->
@include('partials._footer')
<!-- End Footer -->
</body>

</html>
