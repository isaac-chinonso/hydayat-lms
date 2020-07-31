@extends('layout.master3')
@section('title')
Tutor Login || Learning Management system
@endsection

@section('content')

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url(../app/images/background/login-register.jpg);">
        @include('include.success')
        @include('include.warning')
        @include('include.error')
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" action="{{ route('signin') }}">
                    <h3 class="text-center m-b-20">Tutor Login</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>

            </div>
        </div>
</section>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
@endsection