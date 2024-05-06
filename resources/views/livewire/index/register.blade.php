<div style=" background-image: url('{{asset("images/wallpaper_1692838619760a70c34ab556d2942bb466c00fec13.jpeg")}}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                width: 100vw;
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                /* Equal to rotateZ(45deg) */

                z-index: -1; /* Place the background behind other content */">
    <style>
        .decorative_bg.bg_1 {
            background: #fff url('{{asset("images/Msi-BG.jpg")}}') no-repeat top right !important;
            background-size: cover !important;
        }

        .question_title h3 {
            font-weight: bolder !important;
        }
        /* CSS to rotate arrow icon */
        select {
            /* Arrow */
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23131313%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
            background-repeat: no-repeat;
            background-position: left 0.7rem top 50%;
            background-size: 0.65rem auto;
            /* Add this for rotating the arrow */
            padding-right: 2.5rem; /* Adjust based on the size of the arrow */
        }
        .phone
        {
            direction:ltr;
        }
    </style>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->


    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <div class="container-fluid d-flex flex-column my-auto">
        <div>
            <div id="wizard_container">
                <div id="top-wizard">
                    <div id="progressbar"></div>
                </div>
                <!-- /top-wizard -->
                <div class="decorative_bg bg_1"></div>
                <form id="wrapped">
                    <input id="website" name="website" type="text" value="">
                    <!-- Leave input above for security protection, read docs for details -->
                    <div id="middle-wizard">
                        <div class="step">
                            <livewire:index.user-register.step-one/>


                            <!-- /row -->
                        </div>
                        <!-- /Step -->
                        <div class="step">
                            <livewire:index.user-register.step-two/>
                        </div>

                    </div>
                    <!-- /middle-wizard -->

                    <!-- /bottom-wizard -->
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
    </div>
    <!-- /Container -->

    <footer>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-5"></div>
                <div class="col-sm-6 col-md-6">
                    <p>© 2024 MSIFARSI</p>
                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /Container -->
    </footer>
    <!-- /Footer -->


</div>
<!-- /flex-column -->



