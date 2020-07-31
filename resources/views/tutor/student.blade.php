@extends('layout.master1')
@section('title')
Students || Learning Management system
@endsection

@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Students</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tutor</a></li>
                        <li class="breadcrumb-item active">Student List</li>
                    </ol>
                    <button type="button" class="btn btn-info m-l-15" data-toggle="modal" data-target="#responsive-modal"><i class="icon-plus"></i> Add Student</button>
                </div>
            </div>
        </div>
        <!-- sample modal content -->
        <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{ route('savelogin') }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Student ID:</label>
                                <input type="text" class="form-control" id="recipient-name" name="student_id" value="{{ Request::old('student_id')}}">
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" id="recipient-name" name="username" value="{{ Request::old('username')}}">
                            </div>
                            <div class="form-group">
                                <label>Phone Number:</label>
                                <input type="text" class="form-control" id="recipient-name" name="phone" value="{{ Request::old('phone')}}">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="text" class="form-control" id="recipient-name" name="password" value="{{ Request::old('password')}}">
                            </div>
                            <div class="form-group">
                                <label>Student Image:</label>
                                <input type="file" class="form-control" id="recipient-name" name="source" value="{{ Request::old('source')}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Student</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        @include('include.success')
        @include('include.warning')
        @include('include.error')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Username</th>
                                        <th>Phone Number</th>
                                        <th>Student Image</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $user->student_id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        @if (empty($user->picture->first()->source))
                                        <td><img src="../app/images/users/1.jpg" class="img-thumbnail" width="50px" height="50px"></td>
                                        @else
                                        <td><img data-toggle="modal" data-target="#myModal{{ $user->id }}" src="../upload/picture/{{ $user->picture->first()->source }}" class="img-thumbnail" width="50px"></td>
                                        <!-- sample modal content -->
                                        <div id="myModal{{ $user->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>{{ $user->username }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <img src="../upload/picture/{{ $user->picture->first()->source }}" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal -->
                                        @endif

                                        <td><a href="#" data-toggle="modal" data-target="#delete{{ $user->id }}"><i class=" icon-trash"></i> Delete Student</a></td>
                                        <!-- sample modal content -->
                                        <div id="delete{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4><strong>Confirm Deletion</strong></h4>
                                                        <p>Are you sure you want to Delete {{ $user->username }} Record</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('deleteuser',$user->id) }}" class="btn btn-success waves-effect waves-light">Yes</a>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        <td><a href="#" data-toggle="modal" data-target="#responsive-modal1{{ $user->id }}"><i class=" icon-note"></i> Edit Student</a></td>
                                        <!-- sample modal content -->
                                        <div id="responsive-modal1{{ $user->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Update Student Detail</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <form method="post" action="{{ route('updateuser', $user->id) }}">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Student ID:</label>
                                                                <input type="text" class="form-control" id="recipient-name" name="student_id" value="{{ $user->student_id }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Username:</label>
                                                                <input type="text" class="form-control" id="recipient-name" name="username" value="{{ $user->username }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Phone Number:</label>
                                                                <input type="text" class="form-control" id="recipient-name" name="phone" value="{{ $user->phone }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Enter New Password:</label>
                                                                <input type="text" class="form-control" id="recipient-name" name="password" placeholder="Enter new password if you wish to change user password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Student Image:</label>
                                                                <input type="file" class="form-control" id="recipient-name" name="source" value="{{ $user->picture->first()->source }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Update Student</button>
                                                        </div>
                                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection