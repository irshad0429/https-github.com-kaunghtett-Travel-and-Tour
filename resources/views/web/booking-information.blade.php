@extends('web.master')

@section('content')


	<!--DASHBOARD-->
	<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				
				
			</div>
			<!--CENTER SECTION-->
					<div class="col-md-12">
					<div class="col-md-3"></div>
					<div class="col-md-6" style="background:white;" >
                    <h2 style="text-align:center;"> Thank You! <span class="fa fa-check-circle" style="color:green;"></span>  </h2>
                    <br>

						
                        <p  style="text-align:center;"><strong >Your Booking is Successfully Received! <br> We'll contact you soon thank you for interesting.</p> </strong>
                        
								<div class="col-md-12" style="border-radius: 10px;border-style: groove;color:#e1386d">
								
								<h4 > Name  : 	{{$bookings->username}}</h4>
								<h4 > Email : 	{{$bookings->email}}</h4>
								<h4 > Where are you come from  : 	{{$bookings->from}}</h4>
								<h4 > Phone  : 	{{$bookings->phone}}</h4>
								<h4 > Details  : 	{{$bookings->address}}</h4>
								<h4 > Package Name  : 	{{$package->name}}</h4>
								<h4 > Duration  : 	{{$package->duration}}</h4>
								<h4 > Location  : 	{{$package->package_location->name}}</h4>
								<h4 > Date  : 	{{$bookings->date}}</h4>
								<h4 > Tour Leader  : 	{{$package->tour_leader->name}}</h4>
								<h4 > Total Members  : 	{{$bookings->quantity}}</h4>
								<h4 > Payment Status  : 	<span class="db-not-done">{{$bookings->status}}</span></h4>
								
								</div> <br><br>
								<hr>
								<br>
								<br>
								<br>
									             
                      
					<span class="fa fa-reply-all"></span> <a href="/" >Back to the home page</a>
								
					
					</div>
					
					<div class="col-md-3"></div>
					
					</div>
					
					
			</div>
			


		</div>
	</section>
	<!--END DASHBOARD-->
	
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

