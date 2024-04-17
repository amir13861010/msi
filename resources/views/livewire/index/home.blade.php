<div>
    <style>
        .container {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .box-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap; /* Allow boxes to wrap onto the next line */
        }

        .box {
            width: 300px;
            height: 100px;
            background-color: #FFFFFF;
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            transition: transform 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
        }

        .box:hover {
            transform: translateY(-5px);
        }

        .box img {
            width: 50px;
            margin-right: 20px;
        }

        .box-text {
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: left;
        }

        /* Dropdown styles */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: transparent; /* Change background color to white */
            min-width: 300px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            top: 102%;
            left: 0;
            border-radius: 5px;
            padding: 10px;
            text-align: right;
        }

        .box:hover .dropdown-content {
            display: block;
        }

        .dropdown-item {
            cursor: pointer;
            padding: 5px 0;
            text-align: center;
            background-color: #fff;
            border-radius: 5px; /* Add rounded corners */
            margin: 5px 0; /* Add space between items */

        }

        .dropdown-item:hover {
            background-color: #ddd;
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .box {
                width: calc(50% - 40px); /* Adjusted width for smaller screens */
                height: auto; /* Allow boxes to have variable height */
                padding: 20px;
            }
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: transparent;
                min-width: 300px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                top: 102%;
                left: 10%;
                transform: translateX(-50%);
                border-radius: 5px;
                padding: 10px;
                /* text-align: right; */ /* حذف این خط */
            }

            .box img {
                width: 50px;
                margin-right: 16px;
                /* اضافه کردن این خطوط برای وسط‌چین کردن عکس */
                display: block; /* این دستور ضروری است تا مارجین خودکار افقی عکس حذف شود */
            }


            .box-text {
                text-align: center !important; /* Center text */
            }
        }
    </style>
    @if(\Illuminate\Support\Facades\Auth::user() != null)
        {{$this->Getlogin()}}
    @endif
    <div class="background-image"></div>

    <div class="container">
        <div class="box-container">
            <div class="box " style="cursor:pointer;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <img style="float: right" src="{{asset("images/add-friend.png")}}" alt="Sign Up">
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div style="text-align: right;cursor: pointer" class="box-text">ثبت نام</div>
                            <div class="dropdown-content">
                                <div class="dropdown-item" ><a style="text-decoration: none;color:black" href="{{route("register")}}">ثبت نام خریدار محصول </a></div>
                                <div class="dropdown-item"><a style="text-decoration: none;color:black" href="{{route("registerAgent")}}"> ثبت نام نماینده</a></div>
                                <!-- اضافه کردن موارد زیر دکمه ثبت نام -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <img style="float: right"  src="{{asset("images/password.png")}}" alt="Login">
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div style="text-align: right" class="box-text"><a style="text-decoration: none;color:black"  href="/login">ورود</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // JavaScript for dropdown functionality
    document.addEventListener("DOMContentLoaded", function() {
        var boxes = document.querySelectorAll('.box');

        boxes.forEach(function(box) {
            var boxText = box.querySelector('.box-text');
            var dropdown = box.querySelector('.dropdown-content');

            box.addEventListener('click', function(event) {
                // Prevent dropdown from closing when clicking on its items
                if (event.target.matches('.dropdown-item')) {
                    return;
                }

                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                } else {
                    // Hide all other dropdowns
                    document.querySelectorAll('.dropdown-content').forEach(function(dropdown) {
                        dropdown.style.display = "none";
                    });
                    // Display the dropdown
                    dropdown.style.display = "block";
                }
            });
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', function(event) {
            if (!event.target.closest('.box')) {
                document.querySelectorAll('.dropdown-content').forEach(function(dropdown) {
                    dropdown.style.display = "none";
                });
            }
        });
    });
</script>


