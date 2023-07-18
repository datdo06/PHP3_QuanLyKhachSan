@extends('admin.index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách Account
                </div>
                <div>
                    <a href="{{url('admin/account-add')}}">
                        <button type="button" class="btn btn-primary" width="50">ADD</button>
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>SDT</th>
                                <th>Image</th>
                                <th>Address</th>
                                <th>Date_Of_Birth</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Acction</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($account as $ac)
                            <tr>
                                <th scope="row">{{$ac -> id}}</th>
                                <td>{{$ac -> name}}</td>
                                <td>{{$ac -> sdt}}</td>
                                <td>
                                    <img src="{{ $ac -> image ? '' . Storage::url($ac -> image) : ''}}" width="50">
                                </td>
                                <td>{{$ac -> address}}</td>
                                <td>{{$ac -> date_of_birth}}</td>
                                <td>{{$ac -> email}}</td>
                                <td>{{$ac -> password}}</td>
                                <td>
                                    <a href="{{route('route_account_update', ["id" => $ac->id]) }} "  class="btn btn-success">
                                        UPDATE
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        DELETE
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
