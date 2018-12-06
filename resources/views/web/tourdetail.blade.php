@extends('web.master')


@section('content')



<!--====== BANNER ==========-->
<section>


<div class="rows inner_banner inner_banner_4" style="background:url('{{asset($packages->packagepath())}}') no-repeat center center;background-size:cover;">
<div class="container">
<h2><span>{{$packages->package_location->name}} -</span> {{$packages->name}}</h2>
<ul>
<li><a href="#inner-page-title">Home</a>
</li>
<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
<li><a href="#inner-page-title" class="bread-acti">{{$packages->package_location->name}}</a>
</li>
</ul>
<p>Book travel packages and enjoy your holidays with distinctive experience</p>
</div>
</div>
</section>
<!--====== TOUR DETAILS - BOOKING ==========-->
<section>
<div class="rows banner_book" id="inner-page-title">
<div class="container">
<div class="banner_book_1">
<ul>
<li class="dl1">Location : {{$packages->package_location->name}}</li>
<!-- <li class="dl2">Price : $ {{$packages->price}}</li> -->
<li class="dl3">Duration : {{$packages->duration}}</li>
<li class="dl4"><a href="{{url('/booking/'.$packages->id)}}" class="hidden-xs" >Book Now</a> </li>
</ul>
</div>
</div>
</div>
</section>
<!--====== TOUR DETAILS ==========-->
<section>

<div class="rows inn-page-bg com-colo">
<div class="container inn-page-con-bg tb-space">
<div class="col-md-9">
<!--====== TOUR TITLE ==========-->


<div class="tour_head">
<h2>{{$packages->name}}</h2> </div>
<!--====== TOUR DESCRIPTION ==========-->

<!--====== ROOMS: HOTEL BOOKING ==========-->

<div class="tour_head1 hotel-book-room">
<h3>Photo Gallery</h3>
<div id="myCarousel1" class="carousel slide" data-ride="carousel">


<div class="carousel-inner carousel-inner1" role="listbox">

@foreach($packagesgallery as $pic)

<div class="item {{$pic->id==$newgallery ? 'active' : ''}}" >
<img src="{{asset($pic->gallerypath())}}" width:460px hieght:345px alt="Chania"> 
</div>


@endforeach
</div>
<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" style="margin-left:20%;margin-top:175%;" aria-hidden="true"></i></span> </a>
<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1"   aria-hidden="true"></i></span> </a>
</div>
</div>
<!--====== TOUR LOCATION ==========-->

<!--====== ABOUT THE TOUR ==========-->
<!--====== DURATION ==========-->
<div class="tour_head1 l-info-pack-days days">
<h3>Detailed Day Wise Itinerary</h3>
<ul>
@foreach($days as $day)
<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
<h4><span style="color:#df3b77;">{{$day->name}}</h4>
<p style="text-align:justify;width:100%;color:#000;">

<?php
echo html_entity_decode($day->description); 
// html to html text covert //

?>

</p>
</li>
@endforeach
</ul>
</div>

<div class="tour_head1">
<h3>Services</h3>
<p style="width:100%;color: #f4364f;">
<?php
echo html_entity_decode($packages->service); 
// html to html text covert //

?></p>
</div>

</div>
<br>
<div class="tour_right head_right tour_help tour-ri-com">
<h3>Review</h3>
<div class="tour_help_1">

	<form method="Post" action="{{ url('/tour-details/'.$packages->id.'/review') }}" name="post" enctype="multipart/form-data">
						{{ csrf_field() }}

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						
							<input type="hidden" name="tour_packages_id" class="form-control" placeholder="Name..." value="{{$packages->id}}">
						
						</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							
							<input type="text" name="name" class="form-control" placeholder="Name...">
							<p class="text-danger">{{ $errors->first('name') }}</p>
						</div>

						<div class="form-group {{ $errors->has('education') ? 'has-error' : '' }}">
							
						<textarea name="message" placeholder="Message ..."></textarea>
							<p class="text-danger">{{ $errors->first('message') }}</p>
                
                
                        </div>

                          <button type="submit" style="margin-right:73%;" class="btn btn-success">Post</button>
</form>
                        
                      

</div>



<div class="tour_right head_right tour_social tour-ri-com">
<h3>Share This Package</h3>
<ul>
<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
</ul>
</div>
<!--====== HELP PACKAGE ==========-->
<div class="tour_right head_right tour_help tour-ri-com">
<h3>Help & Support</h3>
<div class="tour_help_1">
<h4 class="tour_help_1_call">Call Us Now</h4>
<h4><i class="fa fa-phone" aria-hidden="true"></i> 95 9 773899925</h4> </div>
</div>
<!--====== PUPULAR TOUR PACKAGES ==========-->
<div class="tour_right tour_rela tour-ri-com">
<h3>Other Packages</h3>
@foreach($otherpackages as $package)
<div class="tour_rela_1"> <img src="{{asset($package->packagepath())}}" width="285px" height="115" alt="" />

<a href="{{url('/tour-details/'.$package->id)}}">

<h4>{{$package->name}} ({{$package->duration}}) </h4>

</a>


<p style="width:100%;color:black;" >
<?php  $hello = strip_tags($package->short_description);

echo substr($hello,0,150);

?>
</p>

<a href="{{url('/tour-details/'.$package->id)}}" class="link-btn">View this package</a>

</div>



@endforeach	
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
<br>
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
<div class="float">



<a href="{{url('/booking/'.$packages->id)}}" >Book Now </a>



</div>
</section>


@endsection('content')