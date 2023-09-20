@extends('admin.index')
@section('content_add')
    <div class="container-fluid">
        <form action="{{route('route_account_add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        <div class="col-xs-6">
                            <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"  alt="your image"
                                 style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                            <input type="file" name="image" accept="image/*"
                                   class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" id="exampleInputPassword1">
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

