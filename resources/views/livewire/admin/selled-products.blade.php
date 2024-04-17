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
            <button onclick="downloadExcel()" style="background-color: #e52a31;color:white" class="btn mb-3">دانلود Excel</button>

            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>سریال</th>
                    <th> نام محصول</th>
                    <th> نام کاربر</th>
                    <th> شماره همراه کاربر</th>
                    <th> نام دسته</th>
                    <th> امتیاز دریافت شده</th>

                </tr>
                </thead>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->product->serial}}</td>
                        <td>{{$product->product->name}}</td>
                        <td>{{$product->user->name}}</td>
                        <td>{{$product->user->phone}}</td>
                        <td>{{$product->product->category->name}}</td>
                        <td>{{$product->product->score}}</td>

                    </tr>
                @endforeach

                <tbody>
                </tbody>
            </table>

        </div>
    </div>
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
