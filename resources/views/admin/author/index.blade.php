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
                        <li class="breadcrumb-item active" aria-current="page">Author list</li>
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
                                    <h4 class="card-title">Author list</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary"
                                       style="float: right;margin-bottom: 17px;">Create Author</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="default_order_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="default_order_length">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        {{--                                    <form method="get" class="form-horizontal" action="{{route('supplier.index')}}" >--}}
                                        {{--                                        <div id="default_order_filter" class="dataTables_filter mb-2" style="float: right;">--}}
                                        {{--                                            <select class="form-control form-control-sm" name="status" onchange="search_post()">--}}
                                        {{--                                                <option value="">Select Status</option>--}}
                                        {{--                                                <option value="1" @if($status == '1') selected @endif>Active</option>--}}
                                        {{--                                                <option value="0" @if($status == '0') selected @endif>Inactive</option>--}}
                                        {{--                                            </select>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div id="default_order_filter" class="dataTables_filter" style="float: right;margin-right: 5px">--}}
                                        {{--                                            <input type="text" class="form-control form-control-sm" name="search" placeholder="Search"--}}
                                        {{--                                                   value="{{Request::get('supplier')}}" onchange="search_post()">--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-sm-2" style="margin-left: 1144px; margin-top: -38px;display: none">--}}
                                        {{--                                            <button id="search" type="submit" class="btn btn-primary">Search</button>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </form>--}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="default_order" class="table table-striped border display"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center" style="width: 60%;">Description</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Permission</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->details }}</td>
                                                    <td><img style="width: 60px;" src="{{ asset($user->image) }}"></td>
                                                    <td class="text-center">
                                                        @if($user->status == 1)
                                                            <span style="font-size: 16px;"
                                                                  class="badge badge-pill badge-success">Active</span>
                                                        @else($user->status == 0)
                                                            <span style="font-size: 16px;"
                                                                  class="badge badge-pill badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($user->permission == 1)
                                                            <span style="font-size: 16px;"
                                                                  class="badge badge-pill badge-success">Approved</span>
                                                        @elseif($user->permission == 2)
                                                            <span style="font-size: 16px;"
                                                                  class="badge badge-pill badge-danger">Declined</span>
                                                        @else($user->permission == 0)
                                                            <span style="font-size: 16px;"
                                                                  class="badge badge-pill badge-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default">Action
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-default dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li><a class="dropdown-item"
                                                                       href="{{ route('user.edit',$user->slug_name) }}"><i
                                                                            class="fa fa-edit"></i> Edit</a></li>
                                                                <li><a class="dropdown-item" href=""
                                                                       onclick="updateStatus({{ $user->id }})"><i class="fa fa-fw fa-search-plus"></i> Status</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="updatePermission({{ $user->id }})">Permission</a>
                                                                <li>
                                                                    <div role="separator" class="dropdown-divider"></div>
                                                                </li>
                                                                <li>
                                                                    <a type="button"
                                                                       onclick="deleteconfirm('{{ $user->id }}')" style="margin-left: 20px;color: rebeccapurple;"><i class="fa fa-trash"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
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
    <div class="modal fade" id="modal-permission">
        <div class="modal-dialog  modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Permission</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-group" style="margin-left: 5px;">
                                <label for="Admin" style="margin-right: 10px">User type: </label>

                                <input type="radio" value="1" id="approval" name="permission">
                                <label class="checkbox-inline" for="approval">Approve</label>

                                <input type="radio" value="2" id="approval1" name="permission">
                                <label class="checkbox-inline" for="approval1">Decline</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" id="send_form" onclick="createPermission()" class="btn btn-primary">Add Changes</button>
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
        let edit_id = null;


        function updatePermission(id) {
            edit_id = id;
            $('#modal-permission').modal();

        }


        function createPermission(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{csrf_token()}}"
                }
            });
            var data = {
                permission: $("input[name='permission']:checked").val(),
            };

            $.ajax({
                method: "POST",
                url: 'user/change-decline/' + edit_id,
                data: data,

                success: function( response ) {
                    console.log(response)
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                }
            });
        }

        function updateStatus(id) {
            let data = {
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                type: 'post',
                url: 'user/change-activity/' + id,
                cache: false,
                data: data,
                success: function (results) {

                    if (results.success === true) {
                        window.location.reload()
                    }
                }
            });
        }



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
                        url: "user/" + id,
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
