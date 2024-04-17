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
            <button style="background-color: #e52a31;color:white" onclick="downloadExcel()" class="btn mb-3">دانلود Excel</button>

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
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->user->phone}}</td>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script>
        function downloadExcel() {
            /* Get current date and time */
            var currentDate = new Date();
            var timestamp = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate() + '_' + currentDate.getHours() + '-' + currentDate.getMinutes() + '-' + currentDate.getSeconds();

            /* Construct filename */
            var filename = 'table_data_' + timestamp + '.xlsx';

            /* Fetch table data */
            var wb = XLSX.utils.table_to_book(document.querySelector('.table'));

            /* Generate XLSX file and save it with the constructed filename */
            XLSX.writeFile(wb, filename);
        }

    </script>
</div>
