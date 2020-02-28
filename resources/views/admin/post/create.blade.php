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
                        <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Post list</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post create</li>
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
                        <form method="post" class="form-horizontal" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('.admin.layouts._messages')
                            <div class="box-body" style="width: 60%;margin: 0 auto;">
                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="name">Author Name<span
                                            style="color: red">*</span></label>
                                    <select class="form-control select2" style="width: 98%;" name="user_id">
                                        <option>Select Author</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="category_id">Category<span
                                            style="color: red">*</span></label>
                                    <select class="form-control select2" style="width: 98%;" name="category_id">
                                        <option>Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="title">Title<span
                                            style="color: red">*</span></label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}"  style="width: 98%;">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="description">Description<span style="color: red">*</span></label>
                                    <textarea type="text" rows="3" class="form-control  @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description"
                                              value="{{ old('description') }}" style="width: 98%;" required></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="published_date">Published date<span
                                            style="color: red">*</span></label>
                                    <input id="published_date" type="date" class="form-control @error('published_date') is-invalid @enderror" name="published_date" value="{{ old('published_date') }}"  style="width: 98%;">
                                    @error('published_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="box-body" style="width: 60%;">
                                    <div class="form-group" style="margin-left: 5px;">
                                        <label for="Admin" style="margin-right: 10px">Is featured: </label>
                                            <input type="radio" value="1" id="featured" name="is_featured" checked>
                                            <label class="checkbox-inline" for="featured">Yes</label>

                                            <input type="radio" value="2" id="featured1" name="is_featured"}} style="margin-left: 10px;">
                                            <label class="checkbox-inline" for="featured1">No</label>
                                    </div>
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

                                <div class="box-body" style="width: 60%;">
                                    <div class="form-group" style="margin-left: 5px;">
                                        <label for="Published" style="margin-right: 10px">Is featured: </label>
                                        <input type="radio" value="1" id="Published" name="status" checked>
                                        <label class="checkbox-inline" for="Published">Published</label>

                                        <input type="radio" value="2" id="Unpublished" name="status"}} style="margin-left: 10px;">
                                        <label class="checkbox-inline" for="Unpublished">Unpublished</label>
                                    </div>
                                </div>

                                <div class="box-body" style="width: 60%;">
                                    <div class="form-group" style="margin-left: 5px;">
                                        <label for="banner_post" style="margin-right: 10px">Banner Post: </label>
                                        <input type="radio" value="1" id="Approve" name="banner_post" checked>
                                        <label class="checkbox-inline" for="Approve">Approve</label>

                                        <input type="radio" value="2" id="Decline" name="banner_post" style="margin-left: 10px;">
                                        <label class="checkbox-inline" for="Decline">Decline</label>
                                    </div>
                                </div>

                                <div class="box-body" style="width: 60%;">
                                    <div class="form-group" style="margin-left: 5px;">
                                        <label for="slider_post" style="margin-right: 10px">Slider Post: </label>
                                        <input type="radio" value="1" id="Approve1" name="slider_post" checked>
                                        <label class="checkbox-inline" for="Approve1">Approve</label>

                                        <input type="radio" value="2" id="Decline1" name="slider_post" style="margin-left: 10px;">
                                        <label class="checkbox-inline" for="Decline1">Decline</label>
                                    </div>
                                </div>

                                <div class="box-footer pull-right">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <button type="reset" class="btn btn-warning btn-flat">Clear</button>
                                    <a href="{{ route('post.index') }}" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
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



