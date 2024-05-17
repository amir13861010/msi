<div>
    <style>
        .image-card-index {
            height: 8rem;
            width: 10rem;
            margin-left: 2rem;
            transform: translateY(0);
            margin-bottom: 0.4rem;
            animation: moveUpDown 5s infinite;
        }

        .btn-custom {
            background-color: #e52a31;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn-custom i {
            font-size: 1.5rem;
        }

        .btn-custom span {
            font-size: 0.9rem;
        }


    </style>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="container mt-5">
                    <div class="table-responsive p-3 table-data border card mt-5">
                        <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                            <h5>گزارش 3 خرید اخیر</h5>
                            <thead>
                            <tr>
                                <th>ماه</th>
                                <th>تعداد </th>
                                <th>قیمت </th>
                            </tr>
                            </thead>
                            @foreach($buys as $buy)
                                <tr>
                                    <td>{{$buy->month->name}}</td>
                                    <td>{{$buy->dataBuy->count}}</td>
                                    <td>{{$buy->dataBuy->price}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container mt-5">
                    <div class="table-responsive p-3 table-data border card mt-5">
                        <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                            <h5>گزارش 3 فروش اخیر</h5>
                            <thead>
                            <tr>
                                <th>ماه</th>
                                <th>تعداد </th>
                                <th>قیمت </th>
                            </tr>
                            </thead>
                            @foreach($sells as $sell)
                                <tr>
                                    <td>{{$sell->month->name}}</td>
                                    <td>{{$sell->dataSell->count}}</td>
                                    <td>{{$sell->dataSell->price}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm mt-lg-4" style="position: relative;top:10rem">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8">
            <div class="card custom-card">
                <div class="card-body h-100">
                    <div class="mb-3">
                        <h6 class="main-content-label mb-1">دسترسی سریع</h6>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-4 col-sm-4">
                                <a href="{{route("BuyOrder")}}">
                                    <button class="btn btn-block btn-custom">
                                        <i class="si si-basket-loaded mb-1"></i>
                                        <span class="d-block">ثبت خرید ماهانه</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-4 col-4 col-sm-4">
                                <a href="{{route("SellOrder")}}">
                                    <button class="btn btn-block btn-custom">
                                        <i class="si si-basket mb-1"></i>
                                        <span class="d-block">ثبت فروش ماهانه</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-4 col-4 col-sm-4">
                                <a href="{{route("AgentAccount")}}">
                                    <button class="btn btn-block btn-custom">
                                        <i class="si si-user mb-1"></i>
                                        <span class="d-block">حساب کاربری</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>


</div>
