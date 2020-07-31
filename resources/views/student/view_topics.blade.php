@extends('layout.header2')
@section('title')
Classes || Learning Management system
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
                <h4 class="text-themecolor">Classes</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                        <li class="breadcrumb-item active">Classes</li>
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
            <div class="col-1">
            </div>
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <hr>
                        <div>
                            <video controls style="width: 100%;max-height:100%;" controlsList="nodownload" id="video">
                                <source src="../../upload/video/{{ $post->video }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video><br>
                            <hr>
                            <p>{!!$post->text !!}</p>
                            <hr>
                            <!-- A button for taking snaps -->
                            <form method="post" enctype="multipart/form-data" action="{{ route('studentsendassignment') }}">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <label><strong>Click on the button below to submit assignment</strong></label>
                                <div class="form-group">
                                    <input type="file" accept="image/*;capture=camera" name="image">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"><a href="{{ route('studentclass') }}" style="color:#fff;">Close</a></button>
                                    <button type="submit" class="btn btn-success btn-sm">Submit Assignment</button>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>

                        </div>
                        <button style="display:none;" id="myBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#responsive-modal">
                            Launch demo modal
                        </button>
                        <!-- sample modal content -->
                        <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Verify</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form method="post" action="{{ route('savevideostatus') }}">
                                        <div class="modal-body">
                                            <p>Click on the verify button to verify that you have watched lesson video</p>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="post_id" value="{{ $post->id }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Verify</button>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
            <div class="col-1">
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