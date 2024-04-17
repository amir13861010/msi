<div>
    <div class="question_title">
        <h3>آپلود مدارک</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10">

            <div class="list_block">
                <ul>
                    <li>
                        <div class="checkbox_radio_container">
                            <input type="radio" id="apartment" name="location" class="required"
                                   wire:model="type" value="hagigi">
                            <label class="radio" for="apartment"></label>
                            <label for="apartment" class="wrapper">حقیقی</label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox_radio_container">
                            <input type="radio" id="villa" name="location" class="required"
                                   wire:model="type"
                                   value="hogogi">
                            <label class="radio" for="villa"></label>
                            <label for="villa" class="wrapper">حقوقی</label>
                        </div>
                    </li>
                    <div class="alert  alert-danger">
                        <ul>
                            <li>برای اشخاص حقیقی جواز کسب الزامی میباشد</li>
                            <li>برای اشخاص حقوقی اساس نامه و اگهی تاسیس الزامی میباشد</li>
                        </ul>
                    </div>
                </ul>
            </div>
            <div class="form-group"
                 style="display: grid; grid-template-columns: repeat(2, 1fr); grid-gap: 10px;">
                <div class="file-input-container">
                    <label style="font-weight: bold" class="mb-2">جواز کسب</label>
                    <input wire:model="license" type="file" name="business_license_file" class="form-control ">
                </div>
                <div class="file-input-container">
                    <label style="font-weight: bold" class="mb-2">اساس‌نامه</label>
                    <input wire:model="statute" type="file" name="articles_of_association_file" class="form-control">
                </div>
                <div class="file-input-container">
                    <label style="font-weight: bold" class="mb-2">آگهی تاسیس</label>
                    <input type="file" wire:model="founded"  name="establishment_announcement_file" class="form-control">
                </div>
            </div>



        </div>
    </div>
    <div id="bottom-wizard">

        <button type="button" name="backward" class="backward btn_1">قبلی</button>

        <button type="button" style="background-color: #e52a31" wire:click="DataSet" name="forward" class="btn_1 ">ثبت</button>
    </div>
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
    </script>

</div>
