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
        .custom-swal-container {
            z-index: 9999;
        }
    </style>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <button class="btn" style="background-color: #e52a31;color:white" wire:click="openModal">افزودن سطح <i class="fe fe-plus"></i></button>
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>نام سطح</th>
                    <th>شروع امتیاز</th>
                    <th>پایان امتیاز</th>
                    <th>آواتار</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                @foreach($ratings as $rating)
                    <tr>
                        <td>{{$rating->name}}</td>
                        <td>{{$rating->from}}</td>
                        <td>{{$rating->to}}</td>
                        <td><img src="{{ url('storage/' . $rating->avatar) }}" alt="Avatar" width="36px" height="36px"></td>
                        <td>
                            <button class="btn btn-warning" wire:click="editRating({{ $rating->id }})">ویرایش</button>
                            <button class="btn btn-danger" wire:click="deleteRating({{ $rating->id }})">حذف</button>
                        </td>
                    </tr>
                @endforeach
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- مودال برای افزودن یا ویرایش سطح -->
    <div class="modal" tabindex="-1" role="dialog" style="display: {{ $isModalOpen ? 'block' : 'none' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $selectedRatingId ? 'ویرایش سطح' : 'افزودن سطح' }}</h5>
                    <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $selectedRatingId ? 'updateRating' : 'addRating' }}">
                        <div class="form-group">
                            <label for="name">نام سطح:</label>
                            <input type="text" class="form-control" id="name" wire:model.defer="ratingName">
                        </div>
                        <div class="form-group">
                            <label for="from">شروع امتیاز:</label>
                            <input type="number" class="form-control" id="from" wire:model.defer="ratingFrom">
                        </div>
                        <div class="form-group">
                            <label for="to">پایان امتیاز:</label>
                            <input type="number" class="form-control" id="to" wire:model.defer="ratingTo">
                        </div>
                        <div class="form-group">
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                            <label for="avatar">آواتار:</label>
                            <input type="file" class="form-control-file" id="avatar" wire:model="ratingAvatar">
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $selectedRatingId ? 'ویرایش' : 'افزودن' }}</button>
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
</div>
