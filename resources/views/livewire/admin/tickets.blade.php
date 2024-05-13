<div>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>تیتر تیکت</th>
                    <th>مشاهده فایل و توضیحات</th>
                    <th>پاسخ</th>
                </tr>
                </thead>
                @foreach($tickets as $ticket)
                    <tr>
 <td>
            @if($ticket->user)
                {{$ticket->user->name}}
            @else
                کاربر حذف شده است
            @endif
        </td>                        <td>{{$ticket->title}}</td>
                        <td>
                            <button class="btn btn-warning" wire:click="showTicket({{$ticket->id}})">مشاهده</button>
                        </td>
                        <td>@if($ticket->answer_id == null)
                               <button class="btn btn-success" wire:click="ShowAnswer({{$ticket->id}})">ارسال پاسخ</button>@else <span class="text-success">پاسخ داده شده</span>
                            @endif</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @if($ModalAnswer)
        <div class="modal" tabindex="-1" role="dialog" style="display: {{ $ModalAnswer ? 'block' : 'none' }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ارسال پاسخ</h5>
                        <button type="button" class="close" aria-label="Close" wire:click="closeModalAnswer">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="" wire:model="answer" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn mt-3 btn-success" wire:click="Send({{$SelectedTicket}})">ثبت پاسخ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($ModalOpened)
        <div class="modal" tabindex="-1" role="dialog" style="display: {{ $ModalOpened ? 'block' : 'none' }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">مشاهده تیکت : {{$SelectedTicket->title}}</h5>
                        <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="display: flex;justify-content: center">
                                        <img src="{{url('storage/' . $SelectedTicket->file)}}" style="height: 10rem"
                                             class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div style="display: flex;justify-content: center">
                                        <a href="{{url('storage/' . $SelectedTicket->file)}}" download="">
                                            <button class="btn mt-3 btn-success">دانلود فایل</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>{{$SelectedTicket->description}}</p>
                                </div>
                            </div>
                        </div>
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
                position: "bottom",
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
