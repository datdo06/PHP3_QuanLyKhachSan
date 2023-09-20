@extends('admin.index')
@section('room_content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách Room
                </div>
                <div>
                    <a href="{{url('admin/room-add')}}">
                        <button type="button" class="btn btn-primary" width="50">ADD</button>
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>ID_ViTri</th>
                            <th>ID_LoaiPhong</th>
                            <th>Status</th>
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($room as $rm)
                            <tr>
                                <th scope="row">{{$rm -> id}}</th>
                                <th scope="row">{{$rm -> name}}</th>
                                <td>
                                    <img src="{{ $rm -> image ? '' . Storage::url($rm -> image) : ''}}" width="50">
                                </td>
                                <td>{{$rm-> price}}</td>
                                <td>{{$rm-> id_vitri}}</td>
                                <td>{{$rm -> id_loaiphong}}</td>
                                <td>{{$rm -> status}}</td>
                                <td>
                                    <a href=" {{route('route_room_update', ["id" => $rm->id]) }}"  class="btn btn-success">
                                        UPDATE
                                    </a>
                                    <a href="{{route('route_room_delete', ["id" => $rm->id]) }}" class="btn btn-danger">
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

