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

        .modal-body {
            max-height: 500px; /* Adjust the height according to your needs */
            overflow-y: auto;
        }
    </style>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>نام و نام خانوادگی مالک</th>
                    <th>شماره تلفن مالک</th>
                    <th>نام فروشگاه / شرکت</th>
                    <th>وضعیت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>  @if($user->agent)
                                {{$user->agent->store}}
                            @else
                                No Agent Assigned
                            @endif</td>
                        <td>@if($user->agent->status == 0)در انتظار تایید@elseتایید شده @endif</td>

                        <td>
                            <button class="btn btn-primary" wire:click="ShowDetail({{$user->id}})"
                                    style="margin-right: 5px;">
                                مشاهده بیشتر
                            </button>

                            @if($user->agent->status == 0)
                                <button class="btn btn-success" wire:click="acceptAgent({{$user->id}})"
                                        style="margin-right: 5px;">
                                    تایید نماینده
                                </button>
                            @endif
                            <button class="btn btn-danger" wire:click="daleteAgent({{$user->id}})"
                                    style="margin-right: 5px;">
                                رد نماینده <i class="si si-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                <tbody></tbody>
            </table>

        </div>
    </div>
    @if($modalOpen)
        <div class="modal" tabindex="-1" role="dialog" style="display: {{ $modalOpen ? 'block' : 'none' }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6> نام مالک : <span>{{$detail->name}}</span></h6>
                        <hr>
                        <h6> شماره تلفن مالک : <span>{{$detail->phone}}</span></h6>
                        <hr>
                        <h6> نام شرکت / فروشگاه : <span>{{$detail->agent->store}}</span></h6>
                        <hr>

                        <h6> نوع کاربر : <span>@if($detail->agent->type == 0)
                                    حقیقی
                                @else
                                    حقوقی
                                @endif</span></h6>
                        <hr>
                        <h6> جواز کسب : </h6>
                        @if($detail->agent->license != null)
                            <img src="{{ url('storage/' . $detail->agent->license) }}" alt="license" width="60px"
                                 height="60px">
                            <button class="btn btn-info" style="margin-right: 5px;">

                                <a href="{{ asset('storage/' . $detail->agent->license) }}" style="color: white"
                                   download="">دانلود جواز کسب</a>
                            </button>
                        @else
                            <span>-</span>
                        @endif
                        <hr>
                        <h6> اساس نامه : </h6>
                        @if($detail->agent->statute != null)
                            <img src="{{ url('storage/' . $detail->agent->statute) }}" alt="license" width="60px"
                                 height="60px">
                            <button class="btn btn-info" style="margin-right: 5px;">

                                <a href="{{ asset('storage/' . $detail->agent->statute) }}" style="color: white"
                                   download="">دانلود اساس نامه</a>
                            </button>
                        @else
                            <span>-</span>
                        @endif
                        <hr>
                        <h6> اگهی تاسیس : </h6>
                        @if($detail->agent->founded != null)
                            <img src="{{ url('storage/' . $detail->agent->founded) }}" alt="license" width="60px"
                                 height="60px">
                            <button class="btn btn-info" style="margin-right: 5px;">

                                <a href="{{ asset('storage/' . $detail->agent->founded) }}" style="color: white"
                                   download="">دانلود اگهی تاسیس</a>
                            </button>
                        @else
                            <span>-</span>
                        @endif

                        <hr>
                        <h4 class="text-center">فروشندگان</h4>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                    <thead>
                                    <tr>

                                        <th>نام فروشنده</th>
                                        <th>شماره تلفن فروشنده</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sellers as $seller)

                                        <tr>


                                            <td>{{$seller->name}}</td>

                                            <td>{{$seller->phone}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <hr>
                        <h4 class="text-center">مسئول فنی</h4>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                    <thead>
                                    <tr>

                                        <th>نام مسئول فنی</th>
                                        <th>شماره تلفن مسئول فنی</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($technical as $seller)

                                        <tr>


                                            <td>{{$seller->name}}</td>

                                            <td>{{$seller->phone}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
@endif
</div>
