@extends('layout.master2')
@section('title')
Assignment List || Learning Management system
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
                <h4 class="text-themecolor">Assignment</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tutor</a></li>
                        <li class="breadcrumb-item active">Assignment list</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive m-t-40">
                            <button type="button" class="btn btn-info btn-sm m-l-15"><a href="{{ route('tutorpost') }}" style="color:#fff;"><i class="icon-eye"></i> Back to post</a></button><br><br>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Students Name</th>
                                        <th>Post Title</th>
                                        <th>Assignment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignment as $assign)
                                    <tr>
                                        <td>{{ $assign->user->username }}</td>
                                        <td>{{ $assign->post->title }}</td>
                                        <td><a href="../../upload/assignment/{{ $assign->image }}" target="_blank">{{ $assign->image }}</a></td>
                                        <td>{{ date('F d, Y', strtotime($assign->created_at)) }}</td>
                                        <td><a href="#" data-toggle="modal" data-target="#delete{{ $assign->id }}"><i class="icon-trash"></i> Delete</a></td>
                                        <!-- sample modal content -->
                                        <div id="delete{{ $assign->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4><strong>Confirm Deletion</strong></h4>
                                                        <p>Are you sure you want to Delete Record</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('deleteassignment',$assign->id) }}" class="btn btn-success waves-effect waves-light">Yes</a>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
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