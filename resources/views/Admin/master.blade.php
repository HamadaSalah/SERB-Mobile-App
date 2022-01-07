@include('Admin.layouts.header')
@include('Admin.layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    @include('Admin.layouts.head')
    @include('Admin.layouts.messages')
    @yield('content')
</main>
@include('Admin.layouts.footer')
