<div>
    <div class="question_title">
        <h3>فرم ثبت نام خریدار محصول</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10">
            <div class="list_block">
                <ul>
                    <li>
                        <div class="form-group">
                            <label style="font-weight: bold" class="mb-2"  for="first_last_name">نام و نام خانوادگی</label>
                            <input type="text" wire:model="name" name="first_last_name" id="first_last_name"
                                   class="form-control required">
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label style="font-weight: bold" class="mb-2" for="education_level">تحصیلات</label>
                            <select name="education_level"  wire:model="education" id="education_level" class="form-control test required">
                                <option value="">انتخاب کنید</option>
                                <option value="زیر دیپلم">زیر دیپلم</option>
                                <option value="دیپلم">دیپلم</option>
                                <option value="فوق دیپلم">فوق دیپلم</option>
                                <option value="لیسانس">لیسانس</option>
                                <option value="فوق لیسانس">فوق لیسانس</option>
                                <option value="دکترا">دکترا</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label style="font-weight: bold" class="mb-2" for="job_title">عنوان شغلی</label>
                            <select name="job_title"  wire:model="job" id="job_title" class="form-control required">
                                <option value="">انتخاب کنید</option>
                                <option value="کارمند بخش دولتی">کارمند بخش دولتی</option>
                                <option value="کارمند بخش خصوصی">کارمند بخش خصوصی</option>
                                <option value="مدیر">مدیر</option>
                                <option value="مهندس">مهندس</option>
                                <option value="معلم">معلم</option>
                                <option value="استاد">استاد</option>
                                <option value="شغل آزاد">شغل آزاد</option>
                                <option value="کارشناس">کارشناس</option>
                                <option value="فریلنسر">فریلنسر</option>
                                <option value="سایر">سایر</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label style="font-weight: bold" class="mb-2" for="date_of_birth">تاریخ تولد</label>
                            <div class="row">
                                <div class="col">
                                    <select  wire:model="year" name="birth_year" id="birth_year" class="form-control required">
                                        <option value="">سال</option>
                                        <!-- Populate the year dropdown with years from 1350 to 1402 -->
                                        <?php
                                        for ($i = 1300; $i <= 1402; $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="arrow-down"></div>
                                </div>
                                <div class="col">
                                    <select  wire:model="month" name="birth_month" id="birth_month" class="form-control required">
                                        <option value="">ماه</option>
                                        <!-- Populate the month dropdown with months from 1 to 12 -->
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select  wire:model="day" name="birth_day" id="birth_day" class="form-control required">
                                        <option value="">روز</option>
                                        <!-- Populate the day dropdown with days from 1 to 30 -->
                                        <?php
                                        for ($i = 1; $i <= 30; $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
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
                class="forward btn_1">بعدی</button>
        <h6 style="display: inline-block;margin-left: 15px;" class="mt-3">قبلا ثبت نام کرده اید؟</h6><h6 style="display: inline-block;margin-left: 15px;"><a href="/login">ورود</a></h6>

    </div>
    <script>
        document.querySelector('.forward').addEventListener('click', function() {

            Livewire.dispatch('dataSet'); // Emit Livewire event 'dataSet'
        });
    </script>
</div>
