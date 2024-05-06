<div>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <h3 class="font-weight-bolder">افزودن تیکت</h3>
            <div class="row row-sm">
                <div class="col-lg-6">
                    <div class="form-group  mg-b-0">
                        <label for="" class="mt-3">تیتر تیکت</label>
                        <input class="form-control" wire:model="title" name="name"
                               type="text">


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group  mg-b-0">
                        <label for="" class="mt-3">فایل تیکت</label>
                        <div
                            x-data="{ uploading: false, progress: 0 }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <input class="form-control" wire:model="file" name="name"
                                   type="file">
                            <div x-show="uploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group  mg-b-0">
                        <label for="" class="mt-3">توضیحات تیکت</label>
                        <textarea name="" class="form-control" wire:model="description" id="" cols="30" rows="10"></textarea>

                    </div>
                </div>
            </div>
            <button class="btn mt-3 btn-success" wire:click="submit">ثبت</button>

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
