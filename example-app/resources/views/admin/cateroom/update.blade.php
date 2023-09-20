@extends('admin.index')
@section('cate_update')
    <div class="container-fluid">
        <form action="{{route('route_cate_update', ['id'=>$cate->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$cate->name}}" id="exampleInputPassword1">
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




