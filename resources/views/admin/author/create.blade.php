@extends('admin.layouts.master')

@section('content')

    <div class="page-breadcrumb border-bottom">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Ruaha Personal Blog</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Author list</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Author create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Author create form</h4>
                        <form method="post" class="form-horizontal" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('.admin.layouts._messages')
                            <div class="box-body" style="width: 60%;margin: 0 auto;">
                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="name">Name<span
                                            style="color: red">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}"  style="width: 98%;">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="email">Email<span
                                            style="color: red">*</span></label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}"  style="width: 98%;">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="box-body" style="width: 60%;">
                                    <div class="form-group" style="margin-left: 5px;">
                                        <label for="Admin" style="margin-right: 10px">User type: </label>
                                            <input type="radio" value="1" id="Admin"
                                                   name="type" checked>
                                            <label class="checkbox-inline" for="Admin">Admin</label>

                                            <input type="radio" value="2" id="Author"
                                                   name="type"}} style="margin-left: 10px;">
                                            <label class="checkbox-inline" for="Author">Author</label>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="details">Description<span style="color: red">*</span></label>
                                    <textarea type="text" rows="3" class="form-control  @error('details') is-invalid @enderror" name="details" id="details" placeholder="Description"
                                              value="{{ old('details') }}" style="width: 98%;" required></textarea>
                                    @error('details')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="password">Password<span style="color: red">*</span></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password"  style="width: 98%;">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="new-password">Confirm Password<span style="color: red">*</span></label>
                                    <input id="new-password" type="password" class="form-control" name="password_confirmation" placeholder="Password" required autocomplete="new-password"  style="width: 98%;">
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="image">Image</label><br>
                                    <img id="image" style="width:30%;margin-bottom: 8px;margin-left: -6px;margin-top: 8px;" src="#"><br>
                                    <input type="file"  name="image" accept="image/*"  required onchange="readURL(this);">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="box-footer pull-right">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <button type="reset" class="btn btn-warning btn-flat">Clear</button>
                                    <a href="{{ route('category.index') }}" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection



