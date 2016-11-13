<html lang="en">
  <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">      
    <link href="css/restaurant.css" rel="stylesheet"/>       

    <meta charset="utf-8">
    <title>Software Engineer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    

    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/bootstrappage.css') }}" rel="stylesheet"/>
    
    <!-- global styles -->
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/browse.css') }}" rel="stylesheet"/>

    <!-- scripts -->
    <script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>     
    <script src="{{ asset('js/superfish.js') }}"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
    <!-- scorll magic -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  </head>
    <body>    
    <div class="top container">
      <div id="trigger"></div>
      <div class="navbar navbar-fixed-top">   
        <div class="navbar-inner main-menu span12">
          <a href="#"><img src="{{ asset('images/logo.png') }}" class="logo pull-left"></a>
          <nav id="menu" class="pull-right">
            <ul>
              <li><a href="{{ url('browse') }}">Browse</a></li>
              <li><a href="#">Meal</a>          
                <ul>
                  <li><a href="{{ url('/browse/vegan') }}">Vegan</a></li>                 
                  <li><a href="{{ url('/browse/islamic') }}">Isalmic</a></li>
                  <li><a href="{{ url('/browse/meal') }}">All Meal</a></li>               
                </ul>
              </li>                             
              <li><a href="{{ url('/browse/dessert') }}">Dessert</a></li>
              <li><a href="{{ url('/browse/drink') }}">Drink</a></li>
              <li><a href="#">Search</a>
                <ul>
                  <li id="search">
                  <form method="get" action="{{ url('/browse/search/') }}">
                    <input type="search" name="search" placeholder="search">
                    <input type="submit" style="display:none;"/>
                  </form>
                  </li>

                </ul>
              </li>
              <li>
              @if (Auth::check())
                <a href="#">{{Auth::user()->username}}</a>
                <ul>
                  <li>
                    <a href="{{ url('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                  </li>
                </ul>
               </li>  
              @else
                <a href="{{ url('login') }}">Login</a></li>
              @endif          
            </ul>
          </nav>
        </div>
      </div>
      <div id="hightlight" class="span6">
        <h1>Food Delivery</h1>
        <h2>We provide food that customers love, day after day after day. People just want more of it.</h2>
      </div>
    </div>

<!--End Header-->

<!--Start Detail-->
@foreach ($restaurants as $restaurant)
    <div class="container">
      <div class="content">
        <div class="row">
          <div id="content-header" class="span12">
            {{$restaurant->restaurant_name}}
          </div>
          <div class="span12 pic">
            <div class="span4">
              <img src="{{ asset('images/restaurants/res'.$restaurant->restaurant_id.'.jpg') }}">
            </div>
            <div class="span4 header-detail">
              <div class="span8">
                <h3>Address </h3>
                <p>{{$restaurant->restaurant_address}}</p>
                <h3>Phone</h3>
                <p>{{$restaurant->restaurant_phone}}</p>
              </div>
            </div>
          </div>
@endForeach
<!--Start Menu and Comment-->

          <div class="container" id="tab">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#Menu">Menu</a></li>
                <li><a data-toggle="tab" href="#Comment">Comment</a></li>
              </ul>

              <div class="tab-content">
                <div class=" tab-pane fade in active" id="Menu">
<!--Menu-->
                	<div class="row">
					<div id="list"  style="margin-left: 8%" class="span11">
						<div class="span3 item">
							<div class="img-contain">
								<img src="images/menu/menu1.jpg">
							</div>
							<div class="span3 item-text">
								<h1>Menu 1</h1>
							</div>
						</div>
						<div class="span3 item">
							<div class="img-contain">
								<img src="images/menu/menu2.jpg">
							</div>
							<div class="span3 item-text">
								<h1>Menu 2</h1>
							</div>
						</div>
						<div class="span3 item">
							<div class="img-contain">
								<img src="images/menu/menu3.jpg">
							</div>
							<div class="span3 item-text">
								<h1>Menu 3</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div id="list" style="margin-left: 8%" class="span11">
						<div class="span3 item">
							<div class="img-contain">
								<img src="images/menu/menu4.jpg">
							</div>
							<div class="span3 item-text">
								<h1>Menu 4</h1>
							</div>
						</div>
						<div class="span3 item">
							<div class="img-contain">
								<img src="images/menu/menu5.jpg">
							</div>
							<div class="span3 item-text">
								<h1>Menu 5</h1>
							</div>
						</div>
						<div class="span3 item">
							<div class="img-contain">
								<img src="images/menu/menu6.jpg">
							</div>
							<div class="span3 item-text">
								<h1>Menu 6</h1>
							</div>
						</div>
					</div>
				</div>
<!--endMenu-->
                </div>
                <div class="tab-pane fade" id="Comment">
<!--Start Comment-->

				<form>
					<div class="form-group commentBox">
  						<label for="comment1">Comment:</label>
  						<textarea class="form-control span10" rows="6" id="comment1"></textarea>
					</div>

				</form>
        <div class="span6"></div>
        <div class="span2">
            <label>Rating
                    <select class="form-control select2" name="Rating" style="width: 40%;">
                    <option selected="selected">1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>No</option>
                  </select>
            </label>
        </div>
        <div class="span2">
					<button type="submit" id="submit" value="Send" class="btn btn-success span1">Submit</button>
        </div>


                    <div class="container">
                        <div class="row">
                            <div class="span10 commentHead">
                                <h3>User Comment</h3>
                            </div><!-- /col-sm-12 -->
                        </div><!-- /row -->
                        <div class="row commentForm">
                            <div class="span1">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="span5">
                                <div class="panel panel-default">
                                    <div >
                                        <strong>myusername</strong> 
                                    </div>
                                    <div>
                                        Panel content
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        </div><!-- /row -->

                        <div class="row commentForm">
                            <div class="span1">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="span5">
                                <div class="panel panel-default">
                                    <div>
                                        <strong>myusername</strong> 
                                    </div>
                                    <div>
                                        Panel content
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        </div><!-- /row -->
                    </div><!-- /container -->
<!--End Comment-->
                </div>
              </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">

      </script>
    </body>
  </html>