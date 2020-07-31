@extends('layout.master2')
@section('title')
Editpost || Learning Management system
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
                <h4 class="text-themecolor">Edit Post</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tutor</a></li>
                        <li class="breadcrumb-item active">Post</li>
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
        @include('include.success')
        @include('include.warning')
        @include('include.error')
        <div class="row">
            <div class="col-12 m-t-30">
                <div class="card">
                    <div class="card-header">
                        Edit Post
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('tutorupdatepost', $post->id) }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Post Title:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="title" value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Class:</label>
                                    <select class="form-control" name="classname_id">
                                        <option selected value="{{ $post->classname_id }}">{{ $post->classname->title }}</option>
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
                                    <textarea class="summernote" name="text">{{ $post->text }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger"><a href="{{ route('tutorpost') }}" style="color:#fff;">Close</a></button>
                                <button type="submit" class="btn btn-success">Update Post</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
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