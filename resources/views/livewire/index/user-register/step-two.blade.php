<div>

        <div class="question_title">
            <h3>فرم ثبت نام خریدار محصول</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">


                <div class="form-group">
                    <label for="telephone">تلفن همراه</label>
                    <input wire:model="phone" placeholder="09*********" type="text" name="telephone" id="telephone" class="form-control phone required">
                </div>
                <!-- Here's the timer display -->

                <div class="form-group position-relative" wire:ignore>
                    <label for="verification_code">کد تایید</label>
                    <input type="text" name="verification_code" wire:model="CodeInput" id="verification_code" class="form-control required pr-5">
                    <button  type="button" id="sendVerificationCode" class="btn btn-danger position-absolute" wire:click="SendCode" style="left: 0; top: 1.2rem;">ارسال کد</button>
                    <!-- Here's the timer display -->
                    <span id="timer" class="position-absolute" style="left: 0; bottom: 0.5rem;"></span>
                </div>

            </div>
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
                }
            });
            Toast.fire({
                icon: event.detail.type,
                title: event.detail.title,
                text: event.detail.text,
                animation: true
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            // گرفتن دکمه ارسال کد و ورودی شماره تلفن
            var sendButton = document.getElementById("sendVerificationCode");
            var phoneNumberInput = document.getElementById("telephone");
            var timerInterval; // تعریف یک متغیر برای نگهداری شناسه تایمر
            var timerDisplay = document.getElementById("timer");

            // وقتی دکمه ارسال کد کلیک شود
            sendButton.addEventListener("click", function () {
                var phoneNumber = phoneNumberInput.value;

                // اعتبارسنجی شماره تلفن
                if (validatePhoneNumber(phoneNumber)) {
                    // توقف تایمر قبلی اگر وجود داشته باشد
                    clearInterval(timerInterval);

                    // غیرفعال کردن دکمه پس از کلیک
                    sendButton.disabled = true;

                    // شروع تایمر جدید
                    startTimer(90, timerDisplay);

                    // اینجا شما معمولا کد تایید را ارسال می‌کنید

                } else {
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
                        icon: "error",
                        title: "خطا",
                        text: "شماره تلفن وارد شده معتبر نیست.",

                        animation: true
                    });
                }
            });

            // تابع تایمر
            function startTimer(duration, display) {
                var timer = duration, minutes, seconds;
                timerInterval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    // به‌روزرسانی نمایشگر تایمر
                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(timerInterval);
                        // فعال کردن دوباره دکمه پس از اتمام تایمر
                        sendButton.disabled = false;
                        // پاک کردن محتوای تایمر
                        display.textContent = "";
                        Livewire.dispatch('timerExpired');
                    }
                }, 1000);
            }

            // تابع اعتبارسنجی شماره تلفن
            function validatePhoneNumber(phoneNumber) {
                // عبارت منظم برای شماره‌های تلفن ایرانی
                var regex = /^09\d{9}$/;
                return regex.test(phoneNumber);
            }
        });
    </script>
    <div id="bottom-wizard">
        <button type="button" name="backward" class="backward btn_1">قبلی</button>
        <button type="button" name="process" class="btn_1" wire:click="register">ثبت نام</button>
    </div>
    </div>

