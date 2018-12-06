<!-- MOBILE MENU -->
<section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="/"><img src="{{asset('web/images/tmmt-logo.png')}}" alt="" />
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4><a href="/">Home</a></h4>
                            <h4><a href="/tour-package">Tour Packages</a></h4>
                            <h4><a href="/destination">Destination</a></h4>
                            <h4><a href="/blog">Blog</a></h4>
                            <h4><a href="/ourteam">Our Team</a></h4>
                            <h4><a href="/about-us">About Us</a></h4>
                            <h4><a href="/contact-us">Contact Us</a></h4>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Email: info@themightymyanmar.tours</a>
                                </li>
                                <li><a href="#">Phone: +95 9 773899925</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="ed-com-t1-right">
                            <ul>
                                <li><a href="login.html">Sign In</a>
                                </li>
                                <li><a href="register.html">Sign Up</a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="https://www.facebook.com/themightymyanmar/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/themightymyanmar/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250"  style="height:65px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="/"><img src="{{asset('web/images/tmmt-logo.png')}}" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li ><a href="/" {!! (Request::is('/') ? 'class="menu_active"' : '') !!} >Home</a>
                                </li>
                                <li class="about-menu">
                                    <a href="/tour-package" {!! (Request::is('tour-package') ? 'class="menu_active"' : '') !!} >Packages</a>
                                   
                                </li>
                                <li class="admi-menu">
                                    <a href="/destination" {!! (Request::is('destination') ? 'class="menu_active"' : '') !!} >Destinations</a>
                                  
                                </li>

                                 <li class="admi-menu">
                                    <a href="/blog" {!! (Request::is('blog') ? 'class="menu_active"' : '') !!} >Blog</a>
                                  
                                </li>

                                <li class="admi-menu">
                                    <a href="/ourteam" {!! (Request::is('ourteam') ? 'class="menu_active"' : '') !!} >Our Team</a>
                                  
                                </li>


                                 <li><a href="/about-us" {!! (Request::is('about-us') ? 'class="menu_active"' : '') !!} >About us</a>
                                </li>
                               
                                
                                <li><a href="/contact-us" {!! (Request::is('contact-us') ? 'class="menu_active"' : '') !!} >Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="search-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-form">
                            <form>
                                <div class="sf-type">
                                    <div class="sf-input">
                                        <input type="text" id="sf-box" placeholder="Search course and discount courses">
                                    </div>
                                    <div class="sf-list">
                                        <ul>
                                            <li><a href="course-details.html">Accounting/Finance</a></li>
                                            <li><a href="course-details.html">civil engineering</a></li>
                                            <li><a href="course-details.html">Art/Design</a></li>
                                            <li><a href="course-details.html">Marine Engineering</a></li>
                                            <li><a href="course-details.html">Business Management</a></li>
                                            <li><a href="course-details.html">Journalism/Writing</a></li>
                                            <li><a href="course-details.html">Physical Education</a></li>
                                            <li><a href="course-details.html">Political Science</a></li>
                                            <li><a href="course-details.html">Sciences</a></li>
                                            <li><a href="course-details.html">Statistics</a></li>
                                            <li><a href="course-details.html">Web Design/Development</a></li>
                                            <li><a href="course-details.html">SEO</a></li>
                                            <li><a href="course-details.html">Google Business</a></li>
                                            <li><a href="course-details.html">Graphics Design</a></li>
                                            <li><a href="course-details.html">Networking Courses</a></li>
                                            <li><a href="course-details.html">Information technology</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sf-submit">
                                    <input type="submit" value="Search Course">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </section>
    <!--END HEADER SECTION-->