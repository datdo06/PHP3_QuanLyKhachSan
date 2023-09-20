@extends('admin.index')
@section('slider_content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách slider
                </div>
                <div>
                    <a href="{{url('admin/slider-add')}}">
                        <button type="button" class="btn btn-primary" width="50">ADD</button>
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($banner as $bn)
                            <tr>
                                <th scope="row">{{$bn -> id}}</th>
                                <td>
                                    <img src="{{ $bn -> image ? '' . Storage::url($bn -> image) : ''}}" width="50">
                                </td>
                                <td>{{$bn-> description}}</td>
                                <td>
                                    <a href=" {{route('route_slider_update', ["id" => $bn->id]) }}"  class="btn btn-success">
                                        UPDATE
                                    </a>
                                    <a href="{{route('route_slider_delete', ["id" => $bn->id]) }}" class="btn btn-danger">
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

