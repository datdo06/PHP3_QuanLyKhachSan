@extends('admin.index')
@section('room_update')
    <div class="container-fluid">
        <form action="{{route('route_room_update', ['id'=>$room->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" id="" cols="100" rows="10" value="{{$room->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input name="price" id="" cols="100" rows="10" value="{{$room->price}}">
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        <div class="col-xs-6">
                            <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"  alt="your image"
                                 style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                            <input type="file" name="image" accept="image/*" src="{{$room -> image ? '' . Storage::url($room -> image) : ''}}"
                                   class="form-control-file @error('image') is-invalid @enderror"  id="cmt_truoc">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Id_vitri</label>
                <input name="id_vitri" id="" value="{{$room->id_vitri}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Id_loaiphong</label>
                <input name="id_loaiphong" value="{{$room->id_loaiphong}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @section('script')
        <script>
            $(function(){
                function readURL(input, selector) {
                    if (input.files && input.files[0]) {
                        let reader = new FileReader();

                        reader.onload = function (e) {
                            $(selector).attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#cmt_truoc").change(function () {
                    readURL(this, '#mat_truoc_preview');
                });

            });
        </script>
    @endsection
@endsection




