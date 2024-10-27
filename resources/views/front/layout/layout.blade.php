    @include('front.layout.header')
    @yield('slider')
    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
    </div>
    <!-- Feature End -->

    @yield('content')
    @include('front.layout.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin_themelib/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin_themelib/easing/easing.min.js')}}"></script>
    <script src="{{asset('admin_themelib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('admin_themelib/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{asset('admin_theme/js/main.js')}}"></script>
    @stack('footer-script')
</body>

</html>