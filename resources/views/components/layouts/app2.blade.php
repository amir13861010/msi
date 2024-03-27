<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'باشگاه مشتریان و نمایندگان MSI' }}</title>
        <link rel="icon" href="{{asset("images/MSI-logo.png")}}" type="image/x-icon"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset("style/app.css")}}">
        <link href="https://fonts.cdnfonts.com/css/iranyekan" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-yjeE0yqU3hnXFXHVra9v7eUmpxe+naVzBbeT+T9vPX9Jldhov8c5o5Ssb/7pofXAaL7Vmt7lqClwovD3CD22+w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @livewireStyles
        <style>
            body{
                font-family: 'IRANYekan', sans-serif;

            }
            .background-image {
                {{--background-image: url('{{asset("images/wallpaper_1648780126fb855a9141174fc947d92dbea8111e59.jpeg")}}');--}}
                background-image: url('{{asset("images/wallpaper_1688355252e91c35540a3ca89ef0622531984984ec.jpeg")}}');
                {{--background-image: url('{{asset("images/wallpaper_16883552732b0072e121b94f0c22ebf0a2b03e8a7c.jpeg")}}');--}}
                {{--background-image: url('{{asset("images/wallpaper_16770428637c6c3c55abf42827563747a7de6f0f3a.jpeg")}}');--}}
                {{--background-image: url('{{asset("images/wallpaper_1677042904808e9282031dee671c0c2002eb534450.jpeg")}}');--}}
                {{--background-image: url('{{asset("images/wallpaper_1692838619760a70c34ab556d2942bb466c00fec13.jpeg")}}');--}}
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                width: 100vw;
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                /* Equal to rotateZ(45deg) */

                z-index: -1; /* Place the background behind other content */
            }
        </style>
    </head>
    <body dir="rtl">
        {{ $slot }}


        @livewireScripts
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <!-- COMMON SCRIPTS -->
        <script src="js/single_files_in_common_scripts/jquery.wizard.js"></script>
        <script src="js/single_files_in_common_scripts/jquery.validate.js"></script>
        <script src="js/single_files_in_common_scripts/float-labels.js"></script>
        <script src="js/single_files_in_common_scripts/bootstrap.bundle.js"></script>
        <script src="js/common_scripts.min.js"></script>
        <script src="js/common_functions.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- SPECIFIC SCRIPTS -->
        <script src="js/wizard_func_2.js"></script>
    </body>
</html>
