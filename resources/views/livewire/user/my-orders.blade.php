<div>
    <style>
        .modal-body h6 {
            font-weight: bold;
        }

        .modal-body h6 span {
            font-weight: normal;
        }

        .modal-body hr {
            background-color: rgba(195, 187, 187, 0.7);
        }
    </style>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th> شماره کاربر</th>
                    <th> نام محصول</th>
                    <th> تعداد محصول</th>
                    <th> سکه پرداخت شده</th>
                    <th>مشاهده</th>

                </tr>
                </thead>
                @foreach($orders as $order)
                    <tr>
                        <td>{{\Illuminate\Support\Facades\Auth::getUser()->name}}</td>
                        <td>{{\Illuminate\Support\Facades\Auth::getUser()->phone}}</td>
                        <td>{{$order->basket->gift->name}}</td>
                        <td>{{$order->basket->quantity}}</td>
                        <td>{{$order->basket->total_coins}}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="ShowModal({{$order->id}})">مشاهده بیشتر...
                            </button>
                        </td>
                    </tr>
                @endforeach
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
    @if($ModalOpen)
        <div class="modal" tabindex="-1" role="dialog" style="display: {{ $ModalOpen ? 'block' : 'none' }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <h6> استان : <span>{{$selectedOrder->province->name}}</span></h6>
                        <hr>
                        <h6> شهر : <span>{{$selectedOrder->city->name}}</span></h6>
                        <hr>
                        <h6> آدرس : <span>{{$selectedOrder->address}}</span></h6>
                        <hr>
                        @if($selectedOrder->comment != null)
                            <h6> توضیحات خریدار : <span>{{$selectedOrder->comment}}</span></h6>
                            <hr>

                        @endif
                        <h6> نام محصول : <span>{{$order->basket->gift->name}}</span></h6>
                        <hr>
                        <h6> تعداد سفارش : <span>{{$order->basket->quantity}}</span></h6>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
