<div>
    <div class="container mt-5">
        <div class="table-responsive p-3 table-data border card mt-5">
            <table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>شماره تلفن کاربر</th>
                    <th>سطح کاربر</th>
                    <th>تغییر سطح</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>@if($user->status == 0 ) ادمین @elseif($user->status == 1 ) خریدار@else نماینده@endif</td>

                        <td>
                            <select class="form-control" wire:change="changeRole({{ $user->id }}, $event.target.value)">
                                <option value="1" @if($user->status == 1) selected @endif>خریدار</option>
                                <option value="0" @if($user->status == 0) selected @endif>ادمین</option>
                                <option value="2" @if($user->status == 2) selected @endif>نماینده</option>

                            </select>
                        </td>
                        <td>    <button class="btn btn-danger" style="margin-right: 5px;" wire:click="deleteUser({{ $user->id }})">
                                حذف کاربر <i class="si si-trash"></i>
                            </button></td>
                    </tr>
                @endforeach
                <tbody></tbody>
            </table>

        </div>
    </div></div>
