<!-- فایل resources/views/user/basket.blade.php -->

<div>
    <style>
        .custom-swal-container {
            z-index: 9999;
        }
    </style>
    @php
        $totalQuantity = 0;
        $totalcoins = 0;
    @endphp

        <!-- Row -->
    @if(count($baskets) == 0)
        <div class="row row-sm mt-3">
            <div class="col-lg-12 col-xl-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <h5>سبد خرید خالی میباشد</h5>
                    </div>
                </div>
            </div>
        </div>
    @else

        <div class="row row-sm mt-3">
            <div class="col-lg-12 col-xl-9 col-md-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h5 class="mb-3 font-weight-bold tx-14">سبد خرید</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border table-hover text-nowrap table-shopping-cart mb-0">
                                <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">محصول</th>
                                    <th scope="col"></th>
                                    <th scope="col" class="wd-120">تعداد محصول</th>
                                    <th scope="col" class="wd-120">تعداد سکه</th>
                                    <th scope="col" class="text-center ">عمل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($baskets as $basket)

                                    @php
                                        $totalQuantity += $basket->quantity;
                                        $totalcoins += $basket->total_coins;
                                    @endphp
                                    <tr>

                                        <td>
                                            <div class="media">
                                                <div class="card-aside-img">
                                                    <img src="{{ url('storage/' . $basket->gift->image) }}" alt="img" class="img-sm">
                                                </div>
                                                <div class="media-body my-auto">
                                                    <div class="card-item-desc mt-0">
                                                        <h6 class="font-weight-semibold mt-0">{{$basket->gift->name}}</h6>
                                                        <dl class="card-item-desc-1">
                                                            <dt>{{$basket->gift->score}}سکه</dt>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>

                                        <td>
                                            <input type="number" style="width: 38%; display: inline-block" class="form-control quantity-input" min="1" wire:model.live="basketQuantities.{{ $loop->index }}" wire:key="{{ $basket->id }}"/>
                                            @if($basketQuantities[$loop->index] != $initialQuantities[$loop->index])
                                                <!-- Disable the update button if the quantity exceeds the user's coins -->

                                                <button wire:click="test" class="btn btn-sm btn-primary {{ $basketQuantities[$loop->index] *  $basket->gift->score > $userCoins ? 'disabled' : '' }}"  >اپدیت</button>
                                            @endif

                                        </td>



                                        <td>{{$basket->total_coins}}</td>
                                        <td class="text-center">
                                            <a href="#" wire:click="removeItemFromBasket({{ $basket->id }})" class="remove-list text-danger tx-20 remove-button" data-abc="true"><i class="fa fa-trash"></i></a>

                                        </td>


                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xl-3 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <h5 class="mb-3 font-weight-bold tx-14">جزئیات کاربر</h5>
                        <h6>نام خریدار: <span style="font-weight: bold;color:red">{{Auth::user()->name}}</span></h6>
                        <h6>شماره تلفن: <span style="font-weight: bold;color:red">{{Auth::user()->phone}}</span></h6>
                    </div>
                </div>
                <div class="card custom-card cart-details">
                    <div class="card-body">
                        <h5 class="mb-3 font-weight-bold tx-14">جزئیات خرید</h5>
                        <dl class="dlist-align">
                            <dt class="">تعداد کل محصول:</dt>
                            <dd class="text-right mr-auto">{{$totalQuantity}}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>تعداد کل سکه:</dt>
                            <dd class="text-right text-danger mr-auto">{{$totalcoins}}</dd>
                        </dl>
                        <div class="step-footer">
                            <button data-direction="next" wire:click="ShowModal" class="step-btn btn btn-success btn-block">ادامه و ثبت اطلاعات</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal" tabindex="-1" role="dialog" style="display: {{ $Modal ? 'block' : 'none' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SubmitData">
                        <div class="form-group">
                            <label class="">استان</label>
                            <select class="form-control select" wire:model.live="state" >
                                <option value="">انتخاب استان</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="">شهر</label>
                            <select class="form-control " wire:model.live="selectedCity" >
                                @if($city)
                                    <option value="">انتخاب شهر</option>
                                    @foreach($city as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="">آدرس</label>
                            <textarea wire:model="address"  class="form-control"  rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="">کدپستی</label>
                            <input class="form-control" wire:model="postal"
                                  type="text">
                        </div>
                        <div class="form-group">

                            <label class="">توضیحات خریدار(اختیاری)</label>
                            <textarea wire:model="comment" class="form-control"  rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
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
    <!-- End Row -->
</div>
