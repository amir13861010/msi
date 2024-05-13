<div>
    <style>

        @media (max-width: 700px) {
            .btn_1 {
                position: relative;right: 12rem
            }
            .custom-swal-container
            {
                width: 90%;
                font-size: xx-small;
            }
        }
    </style>
    @if(\Illuminate\Support\Facades\Auth::user() != null)
        {{$this->Getlogin()}}
    @endif
    <div class="question_title">
        <h3>فرم ورود</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10">

            <div class="form-group">
                <label for="telephone">تلفن همراه</label>
                <input wire:model="phone" placeholder="09*********" type="text" name="telephone" id="telephone"
                       class="form-control phone required">
            </div>
            <!-- Here's the timer display -->
            <div class="list_block">
                <ul>
                    <li>
                        <div class="checkbox_radio_container">
                            <input type="radio" id="apartment" name="location" class="required"
                                   wire:model.live="InputType" value="ShowCode">
                            <label class="radio" for="apartment"></label>
                            <label for="apartment" class="wrapper">کد یکبار مصرف</label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox_radio_container">
                            <input type="radio" id="villa" name="location" class="required" wire:model.live="InputType"
                                   value="ShowPassword">
                            <label class="radio" for="villa"></label>
                            <label for="villa" class="wrapper">رمزعبور</label>
                        </div>
                    </li>

                </ul>
            </div>
            @if($InputType == "ShowCode")

                <div class="form-group position-relative">
                    <label for="verification_code">کد تایید</label>
                    <input type="text" name="verification_code" wire:model="CodeInput" id="verification_code"
                           class="form-control required pr-5">

                    <!-- Timer display -->
                    <div wire:ignore>
                        <button type="button" class="btn  btn-success"
                                style="    left: -1px;
    top: 1.3rem;height:37px;  position: absolute;z-index: 2;float: left;transform: translateX(2px);"
                                id="startButton" wire:click="sendSms">ارسال کد
                        </button>
                        <span class="position-absolute" style="left: 10px; bottom: 0.5rem;font-size: larger;"
                              id="timer">90</span>
                    </div>
                </div>                    <!-- Here's the timer display -->

            @elseif($InputType == "ShowPassword")
                <div style="position: relative;">
                    <input id="password-field" style="font-family: 'iransans';" wire:model="password"
                           name="password"
                           style="background: transparent;color:white;"
                           type="{{ $show != '1' ? 'password' : 'text' }}" class="form-control password"
                           id="password" placeholder="رمز عبور خود را وارد کنید"/>
                    <span wire:click="ShowPassword"
                          style="position: absolute;color:black;left: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"><i
                            class="fa-solid fa-eye"></i></span>
                </div>
            @endif
        </div>
    </div>
    <div id="bottom-wizard" class="mt-4">
        <button type="button" class="btn_1 d-block" wire:click="register">ورود </button>
        <h6 style="display: inline-block;margin-left: 15px;" class="mt-3">حساب کاربری ندارید؟</h6><h6 style="display: inline-block;margin-left: 15px;"><a href="/register-agent">ثبت نام نماینده</a></h6><h6 style="display: inline-block;margin-left: 15px;"><a href="/register">ثبت نام خریدار محصول</a></h6>
    </div>

    <!-- /row -->

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>

    <script>
        window.addEventListener('swal:modal', function (event) {
            const Toast = Swal.mixin({
                toast: true,
                position: "center",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
                customClass: {
                    container: 'custom-swal-container' // اعمال کلاس سفارشی برای استایل‌دهی
                }
            });
            Toast.fire({
                icon: event.detail.type,
                title: event.detail.title,
                text: event.detail.text,
                animation: true
            });
        });
        window.addEventListener('swal:modal', function (event) {
            const Toast = Swal.mixin({
                toast: true,
                position: "center",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: event.detail.type,
                title: event.detail.title,
                text: event.detail.text,
                animation: true
            });
        });
        let countdown;
        window.addEventListener('timer', function () {


            // دکمه را پنهان کن و تایمر را نمایش بده
            document.getElementById('startButton').style.display = 'none';
            document.getElementById('timer').style.display = 'block';

            // زمان ابتدایی به ثانیه
            let timeInSeconds = 90;

            // قطع تایمر قبلی اگر وجود داشته باشد
            clearInterval(countdown);

            // تنظیم تایمر جدید
            countdown = setInterval(function () {
                // نمایش زمان باقی‌مانده
                document.getElementById('timer').textContent = timeInSeconds;

                // کاهش زمان
                timeInSeconds--;

                // اگر زمان به پایان رسیده باشد، توقف تایمر و نمایش دکمه
                if (timeInSeconds < 0) {
                    clearInterval(countdown);
                    document.getElementById('timer').textContent = 'پایان!';
                    setTimeout(function () {
                        Livewire.dispatch("resetToken");
                        document.getElementById('timer').textContent = '90';
                        document.getElementById('startButton').style.display = 'block';
                        document.getElementById('timer').style.display = 'none';
                    }, 2000); // تاخیر 2 ثانیه و نمایش دوباره دکمه
                }
            }, 1000); // تایمر هر ثانیه یکبار فعال می‌شود
        });


    </script>

</div>
