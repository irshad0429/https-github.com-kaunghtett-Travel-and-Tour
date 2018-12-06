@extends('web.master')

@section('content')


<!-- TOP SEARCH BOX -->

    <!--END HEADER SECTION-->
	
	<!--====== HOTELS LIST ==========-->
	<section class="hot-page2-alp hot-page2-pa-sp-top">
		<div class="container">
			<div class="row inner_banner inner_banner_3 bg-none"   style="background-position:top;">
				<div class="hot-page2-alp-tit">
					<h1>Top Travel Packages</h1>
					<ul>
						<li><a href="#inner-page-title">Home</a> </li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#inner-page-title" class="bread-acti">Packages</a> </li>
					</ul>
					<p>Professionally and passionately create tour packages by well-travelled experts. </p>
				</div>
			</div>
			<div class="row">
				<div class="hot-page2-alp-con">
					<!--LEFT LISTINGS-->
					<div class="col-md-3 hot-page2-alp-con-left">
						<!--PART 1 : LEFT LISTINGS-->
						<div class="hot-page2-alp-con-left-1">
							<h3>Other Destinations</h3> </div>
						<!--PART 2 : LEFT LISTINGS-->
						<div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb">
							<ul>
								<!--LISTINGS-->
								@foreach($destinations as $des)
								<li>
									<a href="{{url('/destinations-details/'.$des->id)}}">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="{{asset($des->destinationspath())}}" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>{{$des->name}}</h5> <span>
											
											<?php  $hello = strip_tags($des->description);

										echo substr($hello,0,100);

								?>
											
											</span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"></div>
									</a>
								</li>
								<!--LISTINGS-->
								@endforeach
								
							</ul>
						</div>

						<div class="hot-page2-alp-con-left-1">
							<h3>Blog Posts</h3> </div>
						<!--PART 2 : LEFT LISTINGS-->
						<div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb">
							<ul>
								<!--LISTINGS-->

								@foreach($blogs as $blog)
								<li>

									
									<a href="{{url('/blog-inner/'.$blog->id)}}">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="{{asset($blog->blogspath())}}" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>{{$blog->title}}</h5> <span>
											
											<?php  $hello = strip_tags($blog->blogs[0]->description);

										echo substr($hello,0,100);

								?>
											
											 </span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> </div>
									</a>
								</li>
								<!--LISTINGS-->
							@endforeach
								
							</ul>
						</div>
						
					</div>
					<!--END LEFT LISTINGS-->
					<!--RIGHT LISTINGS-->
					<div class="col-md-9 hot-page2-alp-con-right">
						<div class="hot-page2-alp-con-right-1">
							<!--LISTINGS-->
							<div class="row">
								
								@foreach($packages as $package)
								<div class="hot-page2-alp-r-list">
									<div class="col-md-3 hot-page2-alp-r-list-re-sp">
										<a href="javascript:void(0);">
									
											<div class="hot-page2-hli-1"> <img src="{{asset($package->packagepath())}}" width=209 height=130 alt=""> </div>
										</a>
									</div>
									<div class="col-md-6">
										<div class="trav-list-bod">
										<a href="{{url('/tour-details/'.$package->id)}}"><h3>{{$package->name}}</h3></a>
										<p style="width:100%">
										<?php  $hello = strip_tags($package->short_description);

												echo substr($hello,0,150);
										
										?>
										 </p>
										</div>
									</div>
									<div class="col-md-3">
										<div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
											<span class="hot-list-p3-4" style="margin-top:18%;">
												<a href="{{url('/tour-details/'.$package->id)}}" class="hot-page2-alp-quot-btn">Book Now</a>
											</span> </div>
									</div>
									<div>
										<div class="trav-ami hidden-xs hidden-sm">
											<h4>Detail and Includes</h4>
											<ul>
												<li><img src="{{asset('web/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
												<li><img src="{{asset('web/images/icon/a15.png')}}" alt=""> <span>Hotel</span></li>
												<li><img src="{{asset('web/images/icon/a16.png')}}" alt=""> <span>Transfer</span></li>
												<li><img src="{{asset('web/images/icon/a18.png')}}" alt=""> <span>{{$package->duration}}</span></li>
												<li><img src="{{asset('web/images/icon/dbl6.png')}}" alt=""> <span>Guide </span></li>
												<li><img src="{{asset('web/images/icon/12.png')}}" alt=""> <span>Meals</span></li>
											</ul>
										</div>	
									</div>
								</div>
								@endforeach

								<div class="row">
								<div class="text-center">

								<?php echo $packages->render();

										?>

										</div>
										</div>
								<!--END LISTINGS-->
								<!--LISTINGS START-->
								
							</div>
						</div>
					</div>
					<!--END RIGHT LISTINGS-->
				</div>
			</div>
		</div>
		</div>
	</section>
	<!--====== TIPS BEFORE TRAVEL ==========-->
	

	<section>
		<div class="rows" style="background-color:white;">
			<div class="footer1 home_title tb-space">
				<div class="pla1 container">
					<!-- FOOTER OFFER 1 -->
					
						 <div class="col-md-4 col-sm-12 col-xs-12">
						 <h3 style="color:white;">Write A Review</h3>
                    <div class="TA_cdswritereviewlg" id="TA_cdswritereviewlg849" style="margin-top:-5%;">
<ul class="TA_links UdX0C6fy3ugL" id="2D7xIobsWV" >
	<li class="xlEYB9kvhGxN" id="KG5XeNhgerBN"><a href="https://www.tripadvisor.com/" target="_blank"><img alt="TripAdvisor" src="https://www.tripadvisor.com/img/cdsi/img2/branding/medium-logo-12097-2.png" /></a></li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=cdswritereviewlg&amp;uniq=849&amp;locationId=12919904&amp;lang=en_US&amp;lang=en_US&amp;display_version=2" ></script>
                    </div><br>
				
					<!-- FOOTER OFFER 2 -->
					
					<div class="col-md-4 col-sm-6 col-xs-12" style="margin-top:-1%;">
					<h3 style="color:white;">ABOUT THE MIGHTY MYANMAR</h3>
							
					<p style="color:white;text-align:justify;">The Mighty Myanmar Travel is a group of enthu- siastic tourism specialists lead by the two professionals of over 20 years experience in Tour Leading & the Tour Operation. We  are a member of Ministry of Hotels & Tourism, Myanmar Tourism Marketing, Union of Myanmar Travel Association.</p>
						
						<img src="{{asset('../theme/umta.png')}}" style="margin-top:0%;" width="97px;" height="90px;" alt="">
						<img src="{{asset('../theme/mt.png')}}" width="97px;" height="90px;"  alt="">
						<img src="{{asset('../theme/new.png')}}" width="174px;"  alt="">	
							<!-- <img src="{{asset('../theme/mt.png')}}" width="92px;" height="87px;" alt=""> -->
							
						
							
							<!-- <h3>42%<span>OFF</span></h3>
							<h4>Colosseum,Burj Al Arab</h4>
							<p>valid only for 18th Nov</p> <a href="booking.html">Book Now</a> </div> -->
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!--====== FOOTER 2 ==========-->
	<section>
		<div class="rows">
			<div class="footer">
				<div class="container">
					<div class="foot-sec2">
						<div>
							<div class="row">
								
								<div class="col-sm-4 foot-spec foot-com">
									<h4><span>Address</span> & Contact Info</h4>
									<p>No.130, Room (5), Bar Ga Ya Street, San Myauk Qr., Sanchaung Tsp, Yangon, Myanmar 11111</p>
									<div class="row">
									
									<p><strong> Phone  : </strong> +95 1 230 4937, +95 9 453 002 885, <br>
									+95 9 773 899 925 </p>

									<p><strong> Email  : </strong>info@themightymyanmar.tours </p>

									<p><strong> Website  : </strong>themightymyanmar.com </p>

									 </div>
								</div>
								<div class="col-sm-4 col-md-3 foot-spec foot-com">
									<h4><span>SUPPORT</span> & HELP</h4>
									<ul class="one-columns">
										<li> <a href="/about-us">About Us</a> </li>
										<li> <a href="/tour-package">Packages</a> </li>
										<li> <a href="/destination">Destinations</a> </li>
										<li> <a href="/blog">Blog </a> </li>
										<li> <a href="/ourteam">Our Team</a> </li>
										
										<li> <a href="/contact-us">Contact Us</a> </li>
									</ul>
								</div>
								<div class="col-sm-4 foot-social foot-spec foot-com">
									<h4><span>Follow</span> with us</h4>
									
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
										<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
										<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
									</ul>
								</div>

								<div class="col-sm-4 foot-social foot-spec foot-com">

									<h3 style="color:white;">We Accept</h3> 
								<div class="row">
								<img src="{{asset('../theme/visa.png')}}" alt="">
<img src="{{asset('../theme/master.png')}}" alt="">

</div>



		</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== FOOTER - COPYRIGHT ==========-->
	<section>
		<div class="rows copy">
			<div class="container">
				<p>Copyrights © 2018 themightymyanmar. All Rights Reserved</p>
			</div>
		</div>
	</section>
	<section>
		<div class="icon-float">
			<ul>
				<li><a href="#" class="sh">1k <br> Share</a> </li>
				<li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
				<li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
			</ul>
		</div>
	</section>
@endsection('content')


