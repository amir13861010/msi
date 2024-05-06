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
                        <td>{{$ticket->user->name}}</td>
                        <td>{{$ticket->title}}</td>
                        <td>
                            <button class="btn btn-warning" wire:click="showTicket({{$ticket->id}})">مشاهده</button>
                        </td>
                        <td>@if($ticket->answer_id == null)
                                <span class="text-danger">بدون پاسخ</span>@else <button class="btn btn-success" wire:click="answers({{$ticket->id}})">مشاهده پاسخ</button>
                            @endif</td>
                    </tr>
                @endforeach
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!-- مودال برای افزودن یا ویرایش سطح -->
    @if($ModalAnswer)
        <div class="modal" tabindex="-1" role="dialog" style="display: {{ $ModalAnswer ? 'block' : 'none' }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">مشاهده تیکت : {{$AnswerTicket->title}}</h5>
                        <button type="button" class="close" aria-label="Close" wire:click="closeAnswerModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$AnswerTicket->answer->answer_text}}</p>
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
</div>
