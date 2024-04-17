<div>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <h5 class="font-weight-bolder">ثبت فروش ماهانه</h5>
            <div class="form-group">
                <select class="form-control" wire:model="monthinput" style="width: 20rem">
                    <option value="">انتخاب ماه</option>

                    @foreach($months as $month)
                        <option value="{{$month->id}}">
                            {{$month->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn" style="background-color: #e52a31;color:white" wire:click="addProduct">افزودن سفارش<i
                    class="fe fe-plus"></i></button>
            @foreach($products as $index => $product)

                <div class="form-group mt-3" wire:key="product_{{ $index }}">
                    <select wire:model="products.{{ $index }}.category_id" class="custom-input"
                            name="gender">
                        <option value="">انتخاب دسته بندی</option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <input class="custom-input" type="text" wire:model="products.{{ $index }}.count"
                           placeholder="تعداد کل"/>
                    <input class="custom-input" type="text" wire:model="products.{{ $index }}.price"
                           placeholder="مبلغ کل"/>




                    <button class="btn btn-danger btn-sm" wire:click="removeProduct({{ $index }})">حذف
                    </button>

                </div>
            @endforeach

            <button class="btn btn-success" wire:click="check">ثبت</button>
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
