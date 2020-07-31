@extends('layout.master')
@section('title')
Homepage || Learning Management system
@endsection

@section('content')
@include('include.success')
@include('include.warning')
@include('include.error')


	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Online</span> educational system.</h2>
								<p>Have you got obstacles that are stopping you from following your academic dreams? Worried about the cost of course fees or other expenses? Little ones to look after? Career just about to take off? Or is your preferred program just too far away? Well, whatever the problem, we might have found the answer -- online learning! Online learning is transforming the way we think about education forever. </p>
								<a href="{{ route('tutorlogin') }}" class="site-btn">TUTOR</a>
								<a href="{{ route('studentlogin') }}" class="site-btn sb-c2">STUDENT</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="../assets/img/hero-bg.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Learn </span> from home.</h2>
								<p>Forget about attending classes for hours, sitting in an uncomfortable chair, and suffering from back pain by the end of the day. You will not be bound to physical class session when you opt for online education. All lectures and needed materials are provided via our online platform, so you’ll easily access them from the comfort of your home. </p>
								<a href="{{ route('tutorlogin') }}" class="site-btn">TUTOR</a>
								<a href="{{ route('studentlogin') }}" class="site-btn sb-c2">STUDENT</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="../assets/img/hero-bg-2.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

    @endsection