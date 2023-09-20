@extends('admin.index')
@section('cate_content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách loại phòng
                </div>
                <div>
                    <a href="{{url('admin/cate-add')}}">
                        <button type="button" class="btn btn-primary" width="50">ADD</button>
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cate as $ct)
                            <tr>
                                <th scope="row">{{$ct -> id}}</th>
                                <td>{{$ct-> name}}</td>
                                <td>
                                    <a href=" {{route('route_cate_update', ["id" => $ct->id]) }}"  class="btn btn-success">
                                        UPDATE
                                    </a>
                                    <a href="{{route('route_cate_delete', ["id" => $ct->id]) }}" class="btn btn-danger">
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

