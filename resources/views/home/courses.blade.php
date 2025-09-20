@extends('layouts.app')
@section('title',' courses ')

@section('content')
<!DOCTYPE html>


	<!-- END nav -->

	<!-- END nav -->

	<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Course Lists <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Course Lists</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 sidebar">
					<div class="sidebar-box ftco-animate">
						
					</div>

					<div class="sidebar-box  p-4 ftco-animate">
						
					</div>

					
				</div>
				<div class="col-lg-9">
    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-6 d-flex align-items-stretch ftco-animate">
              <div class="project-wrap">
                <a href="{{ route('courses.show', $course->id) }}" class="img"
                   style="background-image: url('{{ $course->image ? asset('Course/'.$course->image) : asset('images/default-course.jpg') }}');">
                  <span class="price">{{ $course->status ?? '—' }}</span>
                </a>
                <div class="text p-4">
                  <h3><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></h3>
                  <p class="advisor">Advisor <span>{{ $course->teacher?->name ?? 'No Teacher' }}</span></p>
                  <ul class="d-flex justify-content-between">
                    <li><span class="flaticon-shower"></span>{{ $course->enrolled_students ?? 0 }}</li>
                    <li class="price">${{ $course->price ?? 0 }}</li>
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
		  <!-- Pagination -->
<div class="mt-4">
    {{ $courses->onEachSide(1)->links('pagination::bootstrap-4') }}
</div>

    </div>
</div>

			</div>
		
		</section>

		<footer class="ftco-footer ftco-no-pt">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">About</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<ul class="ftco-footer-social list-unstyled float-md-left float-lft">
								<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
							<h2 class="ftco-heading-2">Help Desk</h2>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">Customer Care</a></li>
								<li><a href="#" class="py-2 d-block">Legal Help</a></li>
								<li><a href="#" class="py-2 d-block">Services</a></li>
								<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
								<li><a href="#" class="py-2 d-block">Refund Policy</a></li>
								<li><a href="#" class="py-2 d-block">Call Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Recent Courses</h2>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">Computer Engineering</a></li>
								<li><a href="#" class="py-2 d-block">Web Design</a></li>
								<li><a href="#" class="py-2 d-block">Business Studies</a></li>
								<li><a href="#" class="py-2 d-block">Civil Engineering</a></li>
								<li><a href="#" class="py-2 d-block">Computer Technician</a></li>
								<li><a href="#" class="py-2 d-block">Web Developer</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Have a Questions?</h2>
							<div class="block-23 mb-3">
								<ul>
									<li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
									<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
									<li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-12 text-center">

						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
			</footer>





			<!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



	

@endsection
