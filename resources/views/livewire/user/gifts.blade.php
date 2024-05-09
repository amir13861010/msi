<div>
    <style>
        .product-grid {
            height: 23rem;
        }

        .empty-product {
            text-align: center;
            font-weight: bolder;
            font-size: large;
        }

        .content-of-input-and-button {
            justify-content: center;
        }
.custom-swal-container
{
    width: 90%;
}
    </style>
    <div class="row row-sm mt-5">
        <div class="col-md-8 col-lg-9">
            <div class="row row-sm">

                @if($gifts->isEmpty())
                    <h3 class="empty-product">محصولی یافت نشد.</h3>
                @else

                    @foreach($gifts as $gift)

                        <div class="col-md-4 p-4 col-lg-4 col-xl-4 col-sm-4">
                            <div style="border-radius: 16px;
    height: 307px;" class="card custom-card">
                                <div class="p-0 ht-100p">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="#" class="image">
                                                <img class="pic-1" alt="محصول-تصویر-1"
                                                     src="{{ url('storage/' . $gift->image) }}" style="height: 145px;
    width: 180px;" height="150px">

                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="#">{{$gift->name}}</a></h3>
                                            <div class="price"><span class="text-danger">{{$gift->score}} <span
                                                        style="color:black;font-size: small">سکه</span></span></div>
                                            <div
                                                class="form-group d-flex content-of-input-and-button align-items-center">
                                                <input style="width: 85px;" @if($coins < $gift->score) disabled
                                                       @endif type="number" class="form-control ml-2"
                                                       wire:model.live="quantity.{{ $loop->index }}"
                                                       id="quantity{{$gift->id}}" min="1"
                                                       value="{{ $quantity[$loop->index] }}">
                                                <button class="btn btn-success" style=""
                                                        @if($coins < $gift->score || $quantity[$loop->index] * $gift->score > $coins)
                                                            disabled
                                                        @endif
                                                        wire:click="selectGift({{$gift->id}}, $event.target.previousElementSibling.value, '{{$gift->name}}','{{$gift->score}}')">
                                                    انتخاب هدیه <i class="si si-basket"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 d-flex flex-column">
            <div class="card custom-card" style="position: sticky; top: 0;">
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" wire:model="searchText" class="form-control"
                                       placeholder="جستجو کردن ...">
                                <span class="input-group-append">
                                    <button wire:click="search" class="btn ripple" style="background-color: #e52a31;color: white"
                                            type="button">جستجو کردن</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-sm">
                <div class="col-md-12 col-lg-12">
                    <div class="card custom-card" style="position: sticky; top: 50px;">
                        <div class="card-header custom-card-header">
                            <h6 class="main-content-label mb-0">دسته بندی ها</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">بر اساس سکه</label>
                                <select name="beast" id="select-beast" class="form-control" wire:model="beast">
                                    <option value="">انتخاب کنید</option>
                                    <option value="1">نمایش از بیشترین سکه</option>
                                    <option value="2">نمایش از کمترین سکه</option>
                                </select>
                                <label class="form-label">بر اساس دسته بندی</label>
                                <select name="category" id="select-category" class="form-control" wire:model="category">
                                    <option value="">انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a class="btn ripple btn-block" style="background-color: #0024ff;color: white" href="#" wire:click="applyFilter">اعمال
                                فیلتر</a>
                            <a class="btn ripple btn-success btn-block" href="#" wire:click="showPurchasableProducts">مشاهده
                                محصولات قابل خرید من</a>
                            <a class="btn ripple btn-danger btn-block" href="#" wire:click="clearFilters">حذف فیلتر های فعال</a>

                        </div>
                    </div>
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
</div>

