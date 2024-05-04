<!DOCTYPE html>
<html lang="en" dir="rtl">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="باشگاه مشتریان و نمایندگان MSI">
    <meta name="author" content="باشگاه مشتریان و نمایندگان MSI">
    <meta name="keywords" content="باشگاه مشتریان و نمایندگان MSI">

    <!-- Favicon -->
    <link rel="icon" href="{{asset("images/MSI-logo.png")}}" type="image/x-icon"/>

    <!-- Title -->
    <title>باشگاه مشتریان و نمایندگان MSI</title>


    <!-- Bootstrap css-->

    <!-- Title -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!-- Icons css-->
    <link href="{{ asset('assets/plugins/web-fonts/icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/web-fonts/plugin.css') }}" rel="stylesheet"/>

    <!-- Style css-->
    <link href="{{ asset('assets/css-rtl/style/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css-rtl/skins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css-rtl/dark-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css-rtl/colors/default.css') }}" rel="stylesheet">
    <!-- Internal Daterangepicker css-->
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Internal Owl Carousel css-->
    <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!-- Multislider css -->
    <link href="assets/plugins/multislider/multislider.css" rel="stylesheet">
    <!-- InternalFileupload css-->
    <link href="assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>

    <!-- InternalFancy uploader css-->
    <link href="assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css-rtl/colors/color.css') }}">

    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Sidemenu css-->
    <link href="{{ asset('assets/css-rtl/sidemenu/sidemenu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-yjeE0yqU3hnXFXHVra9v7eUmpxe+naVzBbeT+T9vPX9Jldhov8c5o5Ssb/7pofXAaL7Vmt7lqClwovD3CD22+w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Switcher css-->
    <link href="{{ asset('assets/switcher/css/switcher-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        .space {
            display: none;
        }
        .cont{
            padding-right: 40px;padding-left: 40px;
        }
        @media screen and (max-width: 800px) {
            .space {
                display: inline-block;
            }
            .main-content .container, .main-content .container-fluid {
                padding-left: 10px !important;
                padding-right: 19px !important;
            }

        }

    </style>

</head>

<body class="main-body leftmenu">

<!-- Switcher -->

<!-- End Switcher -->

<!-- Loader -->
{{--<div id="global-loader">--}}
{{--    <div style="display: flex;justify-content: center;align-items: center;background-color: black;position: fixed;--}}
{{--        top: 0px;left: 0px;z-index: 9999;width: 100%;height: 100%;opacity: 0.78;--}}
{{--        ">--}}
{{--        <livewire:components.loader/>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End Loader -->

<!-- Page -->
<!-- Page -->
<div class="page">

    <livewire:components.side-bar/>

    <div class="main-content side-content pt-0">
        <div class="container-fluid cont" style="">
            <div class="inner-body">

                <!-- End Page Header -->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container space mt-4 mb-4 "></div>

                        {{$slot}}
                    </div>
                </div>
                <!-- End Row -->


            </div>
        </div>
    </div>


    <!-- End Sidebar -->
</div>
<!-- End Page -->

<!-- Back-to-top -->
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap-rtl.js') }}"></script>

<!-- Perfect-scrollbar js -->
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js') }}"></script>

<!-- Sidemenu js -->
<script src="{{ asset('assets/plugins/sidemenu/sidemenu-rtl.js') }}"></script>

<!-- Sidebar js -->
<script src="{{ asset('assets/plugins/sidebar/sidebar-rtl.js') }}"></script>

<!-- Select2 js-->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Internal Parsley js-->
<script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

<!-- Internal Form-validation js-->
<script src="{{ asset('assets/js/form-validation.js') }}"></script>

<!-- Sticky js -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- Internal Fileuploads js-->
<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>

<!-- Internal Owl Carousel js-->
<script src="assets/plugins/owl-carousel/owl.carousel-rtl.js"></script>

<!-- Multislider js -->
<script src="assets/plugins/multislider/multislider-rtl.js"></script>
<script src="assets/js/carousel-rtl.js"></script>
<!-- Internal Daternagepicker js-->
<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- InternalFancy uploader js-->
<script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="assets/plugins/fancyuploder/fancy-uploader.js"></script>
<!-- Switcher js -->
<script src="{{ asset('assets/switcher/js/switcher-rtl.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>

<!-- Internal Accordion-Wizard-Form js-->
<script src="{{ asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>

<!-- Internal Form-wizard js-->
<script src="{{ asset('assets/js/form-wizard-rtl.js') }}"></script>
<script src="{{ asset('assets/js/form-elements.js') }}"></script>
<!-- Internal Check-all-mail js-->
<script src="{{ asset("assets/js/check-all-mail.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Jquery-steps js -->
<script src="{{ asset("assets/plugins/checkout-jquery-steps/jquery.steps.min.js") }}"></script>
<script src="{{ asset("assets/js/checkout-jquery-steps.js") }}"></script>
<script src="assets/js/handleCounter.js"></script>
</body>
</html>
