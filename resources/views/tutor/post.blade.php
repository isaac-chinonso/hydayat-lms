@extends('layout.master1')
@section('title')
Posts List || Learning Management system
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
                <h4 class="text-themecolor">Posts</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tutor</a></li>
                        <li class="breadcrumb-item active">Post list</li>
                    </ol>
                    <button type="button" class="btn btn-info m-l-15" data-toggle="modal" data-target="#responsive-modal"><i class="icon-plus"></i> Add Post</button>

                </div>
            </div>
        </div>
        <!-- sample modal content -->
        <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Add Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{ route('savepost') }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label">Title of Post:</label>
                                <input type="text" class="form-control" placeholder="Post Title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Class:</label>
                                <select class="form-control" name="classname_id">
                                    <option selected disabled>Choose Class</option>
                                    @foreach($class as $class)
                                    <option value="{{ $class->id }}">{{ $class->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Video Content:</label>
                                <input type="file" class="form-control" name="video">
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Text Content:</label>
                                <textarea class="summernote" name="text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Post</button>
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
                            <table id="example23" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Class</th>
                                        <th>video</th>
                                        <th>Date</th>
                                        <td>Status</td>
                                        <td>Assignment</td>
                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->classname->title }}</td>
                                        <td><a href="../upload/video/{{ $post->video }}" target="_blank">{{ $post->video }}</a></td>
                                        <td>{{ date('F d, Y', strtotime($post->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('videostatus', $post->id) }}"><i class="icon-eye"></i> View Status</a>
                                        </td>
                                        <td><a href="{{ route('assignment', $post->id) }}"><i class=" icon-eye"></i> View Assignment</a></td>
                                        <td><a href="{{ route('tutoreditpost', $post->id) }}"><i class=" icon-pencil"></i> Edit</a></td>


                                        <td><a href="#" data-toggle="modal" data-target="#delete{{ $post->id }}"><i class="icon-trash"></i> Delete</a></td>
                                        <!-- sample modal content -->
                                        <div id="delete{{ $post->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                        <a href="{{ route('deletepost',$post->id) }}" class="btn btn-success waves-effect waves-light">Yes</a>
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