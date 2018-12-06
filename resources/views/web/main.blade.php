@extends('web.master')

@section('content')

<section>
        <div class="tourz-search">
            <div class="container">
                <div class="row">
                    <div class="tourz-search-1">
                        <h1>Flawless Experience for You!</h1>
                        <p>Go with The Mighty Myanmar Travel where you will be greeted with genuine smile by people who really know the country!</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->

    <section>
        <div class="rows pad-bot-redu tb-space">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Top <span>Tour Packages</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Professionally and passionately create tour packages by well-travelled experts.</p>
                </div>
                <div>

                    @foreach($packages as $package)
                    <!-- TOUR PLACE 1 -->
                    <div class="col-md-4 col-sm-6 col-xs-12 b_packages wow slideInUp" data-wow-duration="0.5s" id="{{$package->id}}">
                        <!-- OFFER BRAND -->
                        <div class="band"> <img src="#" alt="" /> </div>
                        <!-- IMAGE -->
                        <div class="v_place_img"> <img src="{{asset($package->packagepath())}}" width="377" height="218" alt="Tour Booking" title="Tour Booking" /> </div>
                        <!-- TOUR TITLE & ICONS -->
                        <div class="b_pack rows">
                            <!-- TOUR TITLE -->
                            <div class="col-md-8 col-sm-8" >
                                <h4><a href="{{url('/tour-details/'.$package->id)}}">{{$package->name}}<span class="v_pl_name">({{$package->package_location->name}})</span></a></h4>
                            </div>
                            <!-- TOUR ICONS -->
                            <div class="col-md-4 col-sm-4 pack_icon">
                                <ul>
                                    <li>
                                        <a href="#"><img src="{{asset('web/images/clock.png')}}" alt="Date" title="Tour Timing" /> </a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{asset('web/images/info.png')}}" alt="Details" title="View more details" /> </a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{asset('web/images/price.png')}}" alt="Price" title="Price" /> </a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{asset('web/images/map.png')}}" alt="Location" title="Location" /> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                   
        @endforeach


    </section>
   
   
    <section>
        <div class="offer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">STILL KEEPING THE BEST SERViCES</span>  
						<span class="ol-3"></span> <span class="ol-5">For You</span>
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration="0.5s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{asset('web/images/icon/a17.png')}}" alt="">
									</a><span>Tailored Tours</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.7s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{asset('web/images/icon/icon4.png')}}" alt=""> </a><span>Group Tours</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.9s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{asset('web/images/icon/1600.png')}}" alt=""> </a><span>Ticketing</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.1s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{asset('web/images/icon/66.png')}}" alt=""> </a><span>Cruises</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.3s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{asset('web/images/icon/a16.png')}}" alt=""> </a><span>Car Rentals</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="offer-r">
                            <div class="or-1"> <span class="or-11">go</span> <span class="or-12">FEEL</span> </div>
                            <div class="or-2"> <span class="or-21">Get</span> <span class="or-22">New</span> <span class="or-23">Experience</span> <span class="or-24">Now</span> <span class="or-25"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== POPULAR TOUR PLACES ==========-->
    <section>

  

        <div class="rows pla pad-bot-redu tb-space">
            <div class="pla1 p-home container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title spe-title-1">
                    <h2>Top <span>Destinations</span> in this month</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Each destination can give you the different tastes.</p>
                </div>
                
               
                <div class="popu-places-home">
                    <!-- POPULAR PLACES 1 -->
                    @foreach($destination as $place)
                    <div class="col-md-6 col-sm-6 col-xs-12 place">
                        <div class="col-md-6 col-sm-12 col-xs-12"> <img src="{{asset($place->destinationspath())}}"  width="234" height="210"  alt="" /> </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <h3><span>{{$place->name}}</span></h3>
                            <p style="width:100%">
										<?php  $hello = strip_tags($place->description);

												echo substr($hello,0,150);
										
										?>
										 </p> <a href="{{url('/destinations-details/'.$place->id)}}" class="link-btn">more info</a> </div>
                    </div>
                    @endforeach

                    
                    
                </div>
            </div>
        </div>
    </section>
   
    <section>
		<div class="rows inn-page-bg com-colo">
			<div class="container tb-space inn-page-con-bg pad-bot-redu" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title">
					<h2>Customer <span>Testimonials</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>We started our work with this morning caffeins.</p>
				</div>
				<div class="p_testimonial">
					<!--====== TESTIMONIALS ======-->
					@foreach($testimonials as $test)
					<div class="col-md-6">
						<div class="p-tesi">	
                            <div class="col-md-9 col-sm-9">
								
								
								<p>{{$test->description}}</p> <address>{{$test->name}}</address> 
            
</div>
						</div>
					</div>
					@endforeach
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					
				</div>
			</div>
		</div>
	</section>




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
							<div class="row" >
							<p style="color:white;text-align:justify;">The Mighty Myanmar Travel is a group of enthu- siastic tourism specialists lead by the two professionals of over 20 years experience in Tour Leading & the Tour Operation. We  are a member of Ministry of Hotels & Tourism, Myanmar Tourism Marketing, Union of Myanmar Travel Association.</p>
						
							<img src="{{asset('../theme/umta.png')}}" style="margin-top:0%;" width="97px;" height="90px;" alt="">
							<img src="{{asset('../theme/mt.png')}}" width="97px;" height="90px;"  alt="">
							<img src="{{asset('../theme/new.png')}}" width="174px;"  alt="">	
							<!-- <img src="{{asset('../theme/mt.png')}}" width="92px;" height="87px;" alt=""> -->
							
							</div>
							
							
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