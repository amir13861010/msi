<div>
    <style>
        .is
        {
            color: #6259ca;
            font-size: x-large;
            font-weight: 700;
        }
    </style>
    <!--Row-->
    <div class="row mt-3 row-sm">

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="card-item">
                        <div class="card-item-icon card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z" opacity=".3"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"></path></svg>
                        </div>
                        <div class="card-item-title mb-2">
                            <label class="main-content-label tx-13 font-weight-bold mb-1">تعداد خریداران </label>
                        </div>
                        <div class="card-item-body">
                            <div class="card-item-stat">
                                <h4 class="font-weight-bold">{{$buyers}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="card-item">
                        <div class="card-item-icon card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z" opacity=".3"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"></path></svg>
                        </div>
                        <div class="card-item-title mb-2">
                            <label class="main-content-label tx-13 font-weight-bold mb-1">تعداد نمایندگان </label>
                        </div>
                        <div class="card-item-body">
                            <div class="card-item-stat">
                                <h4 class="font-weight-bold">{{$agents}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="card-item">
                        <div class="card-item-icon card-icon">
                          <i class="si is si-present"></i>
                        </div>
                        <div class="card-item-title mb-2">
                            <label class="main-content-label tx-13 font-weight-bold mb-1">تعداد هدایا </label>
                        </div>
                        <div class="card-item-body">
                            <div class="card-item-stat">
                                <h4 class="font-weight-bold">{{$gifts}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container mb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="container mt-5">
                        <div class="table-responsive p-3 table-data border card mt-5">
                            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                                <h5>گزارش 3 خرید برتر نمایندگان</h5>
                                <thead>
                                <tr>
                                    <th>نام مالک</th>
                                    <th>نام شرکت</th>
                                    <th>مبلغ کل </th>
                                </tr>
                                </thead>
                                @foreach($topAgents as $topAgent)
                                    <tr>
                                        <td>{{ $topAgent->name }}</td>
                                        <td>{{ $topAgent->store }}</td>
                                        <td>{{ $topAgent->total_count . " تومان " }}</td>
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
                                <h5>گزارش 3 فروش برتر نمایندگان</h5>
                                <thead>
                                <tr>
                                    <th>نام مالک</th>
                                    <th>نام شرکت</th>

                                    <th>مبلغ کل </th>
                                </tr>
                                </thead>
                                @foreach($topAgentsSell as $topAgentsSelle)
                                    <tr>
                                        <td>{{ $topAgentsSelle->name }}</td>
                                        <td>{{ $topAgent->store }}</td>

                                        <td>{{ $topAgentsSelle->total_count." تومان " }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
