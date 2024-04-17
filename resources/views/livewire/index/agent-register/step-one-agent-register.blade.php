{{--step-one-agent-register.blade.php--}}
<div>
    <div class="question_title">
        <h3>فرم ثبت نام نماینده</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10">
            <div class="list_block">
                <ul>
                    <div class="form-group"
                         style="display: grid; grid-template-columns: repeat(1, 1fr); grid-gap: 10px;">

                        <div class="file-input-container">
                            <label style="font-weight: bold" class="mb-2" for="first_last_name">نام و نام خانوادگی
                                مالک</label>
                            <input type="text" wire:model="name" name="first_last_name" id="first_last_name"
                                   class="form-control required">
                        </div>
                        <div class="file-input-container">
                            <label style="font-weight: bold" class="mb-2" for="first_last_name">شماره تلفن مالک</label>
                            <input type="text" wire:model="phone" maxlength="11" name="phone_number" id="phone_number"
                                   class="form-control required">
                        </div>
                        <div class="file-input-container">
                            <label style="font-weight: bold" class="mb-2" for="first_last_name">نام شرکت/فروشگاه</label>
                            <input type="text" wire:model="store" name="store_name" id="store_name"
                                   class="form-control required">
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
            <!-- /list_block-->
        </div>
    </div>
    <div id="bottom-wizard">

        <button type="button" style="background-color: #e52a31;display: block" name="forward"
               wire:click="sendData" class="forward btn_1">بعدی
        </button>
        <h6 style="display: inline-block;margin-left: 15px;" class="mt-3">قبلا ثبت نام کرده اید؟</h6><h6 style="display: inline-block;margin-left: 15px;"><a href="/login">ورود</a></h6>

    </div>
    <script>
        document.querySelector('.forward').addEventListener('click', function () {

            Livewire.dispatch('dataSet'); // Emit Livewire event 'dataSet'
        });
    </script>
</div>
