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
                        <li class="breadcrumb-item active"><a href="{{ route('tags.index') }}">Tag list</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tag edit</li>
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
                        <h4 class="card-title">Tag edit form</h4>
                        <form method="post" class="form-horizontal" action="{{ route('tags.update',$tag) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.layouts._messages')
                            <div class="box-body" style="width: 60%;margin: 0 auto;">
                                <div class="form-group" style="margin-left: 5px;">
                                    <label for="name">Name<span
                                            style="color: red">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="tag_name" placeholder="Name" value="{{ $tag->tag_name }}"  style="width: 98%;">
                                    @error('tag_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="box-footer pull-right">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <button type="reset" class="btn btn-warning btn-flat">Clear</button>
                                    <a href="{{ route('tags.index') }}" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





