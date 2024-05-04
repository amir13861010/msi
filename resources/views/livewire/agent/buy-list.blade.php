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
                    <th>نام مدیر</th>
                    <th> ماه سفارش</th>
                    <th> مبلغ کل</th>

                    <th>مشاهده</th>

                </tr>
                </thead>
                @foreach($lists as $list)
                    <tr>
                        <td>{{\Illuminate\Support\Facades\Auth::getUser()->name}}</td>

                        <td>{{$list->month->name}}</td>
                        <td>
                            {{$list->dataBuy->sum('price')}}
                            {{-- نمایش جمع قیمت‌ها --}}

                        </td>
                        <td>
                            <button class="btn btn-primary" wire:click="ShowModal({{$list->id}})">مشاهده بیشتر...
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

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                    <thead>
                                    <tr>

                                        <th>دسته بندی</th>
                                        <th>تعداد فروش</th>
                                        <th>قیمت کل</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($selectedOrder as $seller)

                                        <tr>


                                            <td>{{$seller->category->name}}</td>
                                            <td>{{$seller->count}}</td>

                                            <td>{{$seller->price}}</td>
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
    @endif
</div>
