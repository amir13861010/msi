<!-- livewire/step-two-agent-register.blade.php -->

<div>
    <style>
        label
        {
            font-size: 0.7rem;
        }
    </style>
    <div class="question_title">
        <h3>اطلاعات فروشنده</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10">
            <button type="button" wire:click="addMoreTechnicalResponsible" class="add-more btn-sm btn btn-primary">
                افزودن
            </button>
            <div class="list_block" style="overflow-y: auto; max-height: 300px;">


                <ul>


                    @foreach($technical_responsibles as $index => $technical_responsible)
                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                        <div class="file-input-container">
                                            <label style="font-weight: bold" class="mb-2"
                                                   for="technical_responsible_name_{{$index}}">نام فروشنده</label>
                                            <input type="text" wire:model="technical_responsibles.{{$index}}.name"
                                                   name="technical_responsible_name_{{$index}}"
                                                   id="technical_responsible_name_{{$index}}"
                                                   class="form-control required">

                                        </div>
                                    </div>
                                    <div class="col-md-5">

                                        <div class="file-input-container">
                                            <label style="font-weight: bold" class="mb-2"
                                                   for="technical_responsible_phone_{{$index}}">شماره تلفن فروشنده
                                                فنی</label>
                                            <input type="text" wire:model="technical_responsibles.{{$index}}.phone"
                                                   name="technical_responsible_phone_{{$index}}"
                                                   id="technical_responsible_phone_{{$index}}"
                                                   class="form-control required">

                                        </div>
                                    </div>

                                    <div class="col-md-1" style="display: flex;align-items:center ">
                                        <a style="cursor: pointer" wire:click="removeTechnicalResponsible({{$index}})"
                                           class="text-danger">حذف</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </ul>
            </div>
            <!-- /list_block-->

        </div>
    </div>
    <div id="bottom-wizard">
        <button type="button" name="backward" class="backward btn_1">قبلی</button>
        <button type="button"  wire:click="test" style="background-color: #e52a31" name="forward" class="@if($DisableButton) @else forward @endif  btn_1 " >بعدی</button>
    </div>
</div>

@push('scripts')
    <script>
        document.querySelector('.add-more').addEventListener('click', function () {
            Livewire.dispatch('addMoreTechnicalResponsible');
        });
    </script>
@endpush
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
