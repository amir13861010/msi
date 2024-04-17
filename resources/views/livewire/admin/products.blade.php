<div>
    <style>
        .table-data {
            margin-top: 10% !important;
        }

        @media screen and (max-width: 700px) {
            .table-data {
                margin-top: 40% !important;
            }
        }

        .modal-body {
            max-height: 400px; /* Adjust the height according to your needs */
            overflow-y: auto;
        }


    </style>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <button class="btn" style="background-color: #e52a31;color:white" wire:click="openModal"> افزودن محصولات جدید <i class="fe fe-plus"></i></button>
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>سریال</th>
                    <th> نام دسته</th>
                    <th> نام</th>
                    <th> امتیاز</th>
                    <th> وضعیت</th>

                </tr>
                </thead>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->serial}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->score}}</td>
                        <td>{{$product->status == 0 ? "غیرفعال" : "فعال شده"}}</td>
                    </tr>
                @endforeach

                <tbody>
                </tbody>
            </table>
            <div class="mt-2">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" style="display: {{ $isModalOpen ? 'block' : 'none' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">افزودن محصولات</h5>
                    <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- فرم افزودن یا ویرایش دسته بندی -->
                    <div class="alert alert-danger">
                        <h6 style="font-weight: bolder;">نکات اپلود فایل</h6>
                        <ul>
                            <li>هنگام اپلود فایل اکسل باید سلول های اول فایل به ترتیب به نام های (serial,category_id,name,score) باشد</li>
                            <br>
                            <li>ستون های (serial,category_id,name,score) به ترتیب (سریال،شناسه دسته بندی،نام محصول و امتیاز) می باشد</li>
                            <br>
                            <li>در ستون category_id باید شناسه دسته بندی نوشته شود. <a target="_blank" href="{{route("AdminCategory")}}">مشاهده شناسه ها</a></li>
                        </ul>
                        <button class="btn btn-success"><a style="color:white" href="{{asset("images/sample.jpg")}}" target="_blank">دانلود نمونه</a></button>
                    </div>
                    <form wire:submit.prevent="uploadExcel" enctype="multipart/form-data">
                        <div
                            x-data="{ uploading: false, progress: 0 }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                        <input type="file" wire:model="excelFile">

                            <div x-show="uploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>
                        <br>
                        @if($excelFile != null)
                        <button type="submit" class="btn btn-primary">آپلود</button>
                        @endif
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
