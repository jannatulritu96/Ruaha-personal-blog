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
                        <li class="breadcrumb-item active" aria-current="page">Tag list</li>
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
                                <h4 class="card-title">Tag list</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('tags.create') }}" class="btn btn-primary" style="float: right;margin-bottom: 17px;">Create Tag</a>
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
                                    <form method="get" class="form-horizontal" action="{{route('tags.index')}}" >
                                        <div class="dataTables_filter">
                                            <button type="submit" class="btn btn-primary" style="float: right;margin-left: 5px;padding: 2.1px 12px;">Search</button>
                                        </div>

                                        <div id="default_order_filter" class="dataTables_filter mb-2" style="float: right;margin-right: 5px">
                                            <input type="text" class="form-control form-control-sm" name="tag_name" placeholder="Tags"
                                                   value="{{Request::get('tags')}}" onchange="search_post()">
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <table id="default_order" class="table table-striped border display" style="width:100%">
                                        <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Tag Name</th>
{{--                                              <th>Total post</th>--}}
                                              <th class="text-right">Action</th>
                                            </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($data as $tag)
                                         <tr>
                                             <td>{{ $tag->id }}</td>
                                             <td>{{ $tag->tag_name }}</td>
{{--                                             <td><a href="{{ route('post.tag_post',['tag_id'=>$tag->id]) }}">{{$tag->rel_post->count() }}</a></td>--}}

                                             <td class="text-right">
                                                 <div class="btn-group">
                                                     <button type="button" class="btn btn-default">Action</button>
                                                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                         <span class="caret"></span>
                                                         <span class="sr-only">Toggle Dropdown</span>
                                                     </button>
                                                     <ul class="dropdown-menu pull-right" role="menu">
                                                         <li><a class="dropdown-item" href="{{ route('tags.edit',$tag->id) }}"><i class="fa fa-edit"></i> Edit</a></li>
{{--                                                         <li><a class="dropdown-item" href="" onclick="updateStatus({{ $post->id }})"><i class="fa fa-fw fa-search-plus"></i> Status</a></li>--}}
                                                         <li><div role="separator" class="dropdown-divider"></div></li>
                                                         <li>
                                                             <a type="button"  onclick="deleteconfirm('{{ $tag->id }}')" style="margin-left: 20px;color: rebeccapurple;"><i class="fa fa-trash"></i>Delete</a>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
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
                        url: "tag/" + id,
                        data: {_token: '{{  @csrf_token() }}' },
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
