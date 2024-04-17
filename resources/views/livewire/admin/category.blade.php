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
            <button class="btn" style="background-color: #e52a31;color:white" wire:click="openModal"> افزودن دسته بندی<i class="fe fe-plus"></i></button>
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th> نام دسته</th>
                    <th> تنظیمات</th>

                </tr>
                </thead>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <button wire:click="editCategory({{$category->id}})" class="btn btn-warning">ویرایش</button>
                            <button wire:click="deleteCategory({{$category->id}})" class="btn btn-danger">حذف</button>
                        </td>
                    </tr>
                @endforeach

                <tbody>
                </tbody>
            </table>

        </div>
    </div>

    <!-- مودال برای افزودن دسته‌بندی -->
    <div class="modal" tabindex="-1" role="dialog" style="display: {{ $isModalOpen ? 'block' : 'none' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $selectedCategoryId ? 'ویرایش دسته بندی' : 'افزودن دسته بندی' }}</h5>
                    <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- فرم افزودن یا ویرایش دسته بندی -->
                    <form wire:submit.prevent="saveCategory">
                        <div class="form-group">
                            <label for="categoryName">نام دسته:</label>
                            <input type="text" class="form-control" id="categoryName" wire:model.defer="categoryName">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $selectedCategoryId ? 'ویرایش' : 'افزودن' }}</button>
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
