@extends('templates.error')
@extends('auth.dashboard')
@section('register')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
{{--                                @if($message = Session::get('Success'))--}}
{{--                                    <div class="alert alert-info">--}}
{{--                                        {{ $message }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <form action="{{url('/validate_registration')}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" name="name" type="text" placeholder="Enter your first name" />
                                                <label for="inputFirstName">Name</label>
                                                @if($errors -> has('name'))
                                                    <span class="text-danger">{{$errors -> first('name')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                        <label for="inputEmail">Email</label>
                                        @if($errors -> has('email'))
                                            <span class="text-danger">{{$errors -> first('email')}}</span>
                                        @endif
                                    </div>
                                    <div class="row mb-3">
                                        <div class="">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                                <label for="inputPassword">Password</label>
                                                @if($errors -> has('password'))
                                                    <span class="text-danger">{{$errors -> first('password')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0 align-items-center">
                                        <button type="submit" class="btn btn-dark btn-block">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="{{url('login') }}">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection

