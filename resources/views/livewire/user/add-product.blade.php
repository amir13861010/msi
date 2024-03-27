<div>
    <style>
        /* Override Bootstrap form-control styles */
        .custom-input {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: .375rem .75rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        @media  (max-width: 500px) {
            .custom-input {
                margin-bottom: 0.5rem;
                display: block;
            }
        }
    </style>
    <div>
        <div class="container mt-5">
            <div class="table-responsive p-3 table-data border card mt-5">
                <button class="btn" style="background-color: #e52a31;color:white" wire:click="addProduct">افزودن <i
                        class="fe fe-plus"></i></button>
                <div>
                    @foreach($products as $index => $product)

                        <div class="form-group mt-3" wire:key="product_{{ $index }}">
                            <select @if($product['isSubmitted']) disabled
                                    @endif wire:model="products.{{ $index }}.category_id" class="custom-input"
                                    name="gender">
                                <option value="">انتخاب دسته بندی</option>

                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            <input class="custom-input" type="text" wire:model="products.{{ $index }}.serial"
                                   @if($product['isSubmitted']) disabled @endif placeholder="سریال محصول"/>
                            <input class="custom-input" type="text" disabled wire:model="products.{{ $index }}.name"
                                   placeholder="نام محصول"/>
                            <input type="text" class="custom-input" disabled wire:model="products.{{ $index }}.price"
                                   placeholder="سکه"/>


                            @if($product['isSubmitted'])
                                <span class="text-success">تایید شده<i class="fe fe-check-circle"></i></span>
                            @else
                                <button class="btn btn-danger btn-sm" wire:click="removeProduct({{ $index }})">حذف
                                </button>

                                <button class="btn btn-primary btn-sm" wire:click="fetchProductData({{ $index }})"
                                        wire:loading.attr="disabled">ثبت
                                </button>
                            @endif
                        </div>
                    @endforeach


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
