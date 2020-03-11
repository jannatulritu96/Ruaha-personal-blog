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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post list</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Post list</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('post.create') }}" class="btn btn-primary" style="float: right;margin-bottom: 17px;">Create New Post</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="default_order_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="default_order_length">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <form method="get" class="form-horizontal" action="{{route('post.index')}}" >
                                            <div class="dataTables_filter">
                                                <button type="submit" class="btn btn-primary" style="float: right;margin-left: 5px;padding: 2.1px 12px;">Search</button>
                                            </div>
                                            <div id="default_order_filter" class="dataTables_filter mb-2" style="float: right;">
                                                <select class="form-control form-control-sm" name="status" onchange="search_post()">
                                                    <option value="">Select Status</option>
                                                    <option value="1" @if($status == '1') selected @endif>Active</option>
                                                    <option value="0" @if($status == '0') selected @endif>Inactive</option>
                                                </select>
                                            </div>

                                            <div id="default_order_filter" class="dataTables_filter" style="float: right;margin-right: 5px">
                                                <select class="form-control form-control-sm" name="user_id" id="user_id">
                                                    <option value="">All users</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div id="default_order_filter" class="dataTables_filter" style="float: right;margin-right: 5px">
                                                <select class="form-control form-control-sm" name="category_id" id="category_id">
                                                    <option value="">All categories</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="default_order" class="table table-striped border display" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Author</th>
                                                <th class="text-left">Category</th>
                                                <th class="text-left">Sub Category</th>
                                                <th class="text-left" >Title</th>
                                                <th class="text-center">Published date</th>
                                                <th class="text-center">Banner Post</th>
                                                <th class="text-center">Slider Post</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Tags</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($data as $post)
{{--                                                {{ dump($post->relUSer->id) }}--}}
                                                @if($post->user_id == auth()->id() || Auth::user()->type == 1)
                                                <tr>
                                                    <td class="text-left">{{ $post->relUSer->name }}</td>
                                                    <td class="text-left">{{ $post->relCategory->name }}</td>
                                                    <td class="text-left">{{ $post->relSubCategory->name }}</td>
                                                    <td class="text-left">{{ $post->title }}</td>
                                                    <td class="text-center">{{ $post->published_date }}</td>
                                                    <td class="text-center">
                                                        @if($post->banner_post == 'Approve')
                                                            <span style="font-size: 12px;" class="badge badge-pill badge-success">Approve</span>
                                                        @else($post->banner_post == 'Decline')
                                                            <span style="font-size: 12px;" class="badge badge-pill badge-danger">Decline</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if($post->slider_post == 'Approve')
                                                            <span style="font-size: 12px;" class="badge badge-pill badge-success">Approve</span>
                                                        @else($post->slider_post == 'Decline')
                                                            <span style="font-size: 12px;" class="badge badge-pill badge-danger">Decline</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center"><img style="width: 60px;" src="{{ asset($post->image) }}"></td>
                                                    <td class="text-center">
                                                        @if($post->status == 1)
                                                            <span style="font-size: 12px;" class="badge badge-pill badge-success">Active</span>
                                                        @else($post->status == 0)
                                                            <span style="font-size: 12px;" class="badge badge-pill badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach($post->relAssigntag as $key=>$tag)

                                                            <span class="badge badge-info">{{ $tag->tag_details->tag_name }}
                                                                <a href="javascript:void()" onclick="DeleteTag({{$tag->id}})"><i class="fa fa-trash text-danger pl-2"></i></a>
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default">Action</button>
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li><a class="dropdown-item" href="{{ route('post.edit',$post->slug_name) }}"><i class="fa fa-edit"></i> Edit</a></li>
                                                                <li><a class="dropdown-item" href="" onclick="updateStatus({{ $post->id }})"><i class="fa fa-fw fa-search-plus"></i> Status</a></li>
                                                                <li><a class="dropdown-item" data-toggle="modal" onclick="setpostid({{ $post->id}})" data-target="#addTag-modal"><i class="fa fa-tag"></i>Add tags</a></li>
                                                                <li><div role="separator" class="dropdown-divider"></div></li>
                                                                <li>
                                                                    <a type="button"  onclick="deleteconfirm('{{ $post->id }}')" style="margin-left: 20px;color: rebeccapurple;"><i class="fa fa-trash"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addTag-modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select name="tag[]" class="form-control select2 selectTag2" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateTag()">Add tag
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        // Add tag modal
        let tag_id = null;

        $('.selectTag2').select2({
            insertTag: function (data, tag) {
                // Insert the tag at the end of the results
                data.push(tag);
            }
        });

        function setpostid(id) {
            tag_id = id;
            $('#addTag-modal').modal();

        }

        function updateTag() {
            var val = $('.selectTag2').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{csrf_token()}}"
                }
            });

            $.ajax({
                type: "POST",
                url: 'post/addTag', // This is what I have updated
                data: {
                    id: tag_id,
                    tag_ids: val
                }
            }).done(function (msg) {
                $('#addTag-modal').modal('hide');
                window.location.reload()
            });
        }
        // delete tag
        function DeleteTag(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo e(url('post/tag_destroy')); ?>/" + id,
                        dataType: 'JSON',
                        success: function (results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success").then(function () {

                                    window.location.reload()
                                })
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
        // status
        function updateStatus(id) {
            let data = {
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                type: 'post',
                url: 'post/change-activity/' + id,
                cache: false,
                data: data,
                success: function (results) {

                    if (results.success === true) {
                        window.location.reload()
                    }
                }
            });
        }

        // delete post
        function deleteconfirm(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: "post/" + id,
                        data: {_token: '{{  @csrf_token() }}'},
                        dataType: 'JSON',
                        success: function (results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success").then(function () {

                                    window.location.reload()
                                })
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }

    </script>
@endsection
