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
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>سریال</th>
                    <th> نام محصول</th>
                    <th> نام دسته</th>
                    <th> امتیاز دریافت شده</th>

                </tr>
                </thead>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->product->serial}}</td>
                        <td>{{$product->product->name}}</td>
                        <td>{{$product->product->category->name}}</td>
                        <td>{{$product->product->score}}</td>

                    </tr>
                @endforeach

                <tbody>
                </tbody>
            </table>

        </div>
    </div>
</div>
