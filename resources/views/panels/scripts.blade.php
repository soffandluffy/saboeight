<!-- BEGIN VENDOR JS-->
<script src="{{asset('js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
@yield('vendor-script')
@include('sweetalert::alert')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
@include('pages.error')
<script src="{{asset('js/plugins.js')}}"></script>
<!-- <script src="{{asset('js/search.js')}}"></script> -->
<script src="{{asset('js/custom/custom-script.js')}}"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
@yield('page-script')