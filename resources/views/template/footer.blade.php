    <script src="{{ asset('mazer') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/app.js"></script>
    <script src="{{ asset('bootstrap5.3') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('sweetalert') }}/sweetalert2.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    {{-- <script src="{{ asset('mazer') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('mazer') }}assets/js/pages/dashboard.js"></script> --}}
    <!-- Custom Page Scripts -->
    <script src="{{ asset('mazer') }}/assets/js/pages/datatables.js"></script>
    {{-- Anda dapat menyertakan skrip kustom Anda di sini jika perlu --}}
    @stack('script')
    </body>
