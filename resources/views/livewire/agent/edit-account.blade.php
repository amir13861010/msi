<div>
    <style>
        .custom-swal-container {
            z-index: 9999;
        }
    </style>
    <div class="row row-sm mt-5">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">ویرایش حساب کاربری</h6>
                    </div>
                    <form>
                        <div class="row row-sm">
                            <div class="col-lg-6">
                                <div class="form-group  mg-b-0">
                                    <label for="" class="mt-3">نام و نام خانوادگی</label>
                                    <input class="form-control " wire:model.live="name" name="name" value="{{$name}}"
                                           placeholder="نام و نام خانوادگی" type="text">
                                    <label for="" class="mt-3">شماره همراه</label>
                                    <input class="form-control" disabled value="{{$phone}}"
                                           placeholder="شماره همراه" type="text">

                                </div>
                            </div>
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <div class="form-group mg-b-0">
                                    <label for="" class="mt-3">رمز عبور</label>
                                    <input class="form-control" wire:model.live="password" placeholder="رمز عبور"
                                           type="password">
                                    <label for="" class="mt-3">تکرار رمزعبور </label>
                                    <input class="form-control" wire:model.live="passwordConfirmation"
                                           placeholder="تکرار رمز عبور" type="password">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                        <h6 class="main-content-label  mb-1">مسئولان فروش</h6>
                        <button class="btn btn-primary btn-sm mb-1" wire:click="ShowSeller">افزودن</button>

                        <div class="container">
                            <div class="row">
                                @foreach($sellers as $seller)
                                    <div class="col-md-6">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4"><input class="form-control"
                                                                             disabled="" value="{{$seller->name}}"
                                                                             type="text"></div>
                                                <div class="col-md-4"><input class="form-control"
                                                                             disabled="" value="{{$seller->phone}}"
                                                                             type="text"></div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-danger"
                                                            wire:click="DeleteSeller({{$seller->id}})">حذف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="main-content-label mb-1">مسئولان فنی</h6>
                            <button class="btn btn-primary btn-sm mb-1" wire:click="ShowTechnical">افزودن</button>
                            <div class="container">
                                <div class="row">
                                    @foreach($technicals as $technical)
                                        <div class="col-md-6">
                                            <div class="container mb-2">
                                                <div class="row">
                                                    <div class="col-md-4"><input class="form-control"
                                                                                 disabled=""
                                                                                 value="{{$technical->name}}"
                                                                                 type="text"></div>
                                                    <div class="col-md-4"><input class="form-control"
                                                                                 disabled=""
                                                                                 value="{{$technical->phone}}"
                                                                                 type="text"></div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-danger"
                                                                wire:click="Deletetechnical({{$technical->id}})">حذف
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2" style="display: grid;justify-items: center;align-items: center;">

                                <button wire:click="updateData"
                                        class="btn btn-success {{$status ? "" : "disabled"}} mb-3">
                                    ثبت ویرایش
                                </button>


                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($technicalModal)
        <div class="modal" tabindex="-1" role="dialog" style="display: {{ $technicalModal ? 'block' : 'none' }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">افزودن مسئول فنی جدید</h5>
                        <button type="button" class="close" aria-label="Close" wire:click="CloseShowTechnical">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="">نام مسئول فنی</label>
                            <input class="form-control" wire:model="nameTechnical"
                                   type="text">
                        </div>
                        <div class="form-group">

                            <label class="">شماره تلفن مسئول فنی</label>
                            <input class="form-control" wire:model="phoneTechnical"
                                   type="text">
                        </div>

                        <button type="submit" wire:click="addTechnical" class="btn btn-primary">ثبت</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($SellerModal)
            <div class="modal" tabindex="-1" role="dialog" style="display: {{ $SellerModal ? 'block' : 'none' }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">افزودن مسئول فروش جدید</h5>
                            <button type="button" class="close" aria-label="Close" wire:click="CloseShowSeller">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="">نام مسئول فروش</label>
                                <input class="form-control" wire:model="nameSeller"
                                       type="text">
                            </div>
                            <div class="form-group">

                                <label class="">شماره تلفن مسئول فروش</label>
                                <input class="form-control" wire:model="phoneSeller"
                                       type="text">
                            </div>

                            <button type="submit" wire:click="addSeller" class="btn btn-primary">ثبت</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
</div>
