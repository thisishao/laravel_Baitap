@extends('frontend.layouts.app')
@section('title')
	Blog | Shoppe
@endsection('title')
@section('js.head')
    <script>
        if(screen.width <= 736){
            document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
        }
    </script>

    <script>
    	
    	$(document).ready(function(){
			//vote
			$('.ratings_stars').hover(
	            // Handles the mouseover
	            function() {
	                $(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
	                $(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );
			var getBlog_id = $("#blog_id").val();
			var getUser_id = $("#user_id").val();

			$('.ratings_stars').click(function(){
				var Values =  $(this).find("input").val();


				if (getUser_id == undefined) {
					alert("Vui lòng đă nhập để đánh giá !!!")
				}else{

					$.ajax({
			        method: "POST",
			        url: "{{route('frontend.blog.rate')}}",
			        data: {
			            rate: Values,
			            blog_id: getBlog_id,
			            user_id: getUser_id,
			  			_token: '{{csrf_token()}}'
			        },
			        success : function(response){
			          console.log(response);
			        }
			      });
				}

		        
		    	if ($(this).hasClass('ratings_over')) {
		            $('.ratings_stars').removeClass('ratings_over');
		            $(this).prevAll().andSelf().addClass('ratings_over');
		            // $(this).nextAll().removeClass('ratings_vote'); 
		        }else {
		        	$(this).prevAll().andSelf().addClass('ratings_over');
		        	// set_votes($(this).parent());
		        }

		    });
		});
    </script>
@endsection('js.head')
@section('content')

		
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{$blog->description}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="/storage/blog/image/{{$blog->image}}" width="710" height="325" alt="">
							</a>
							{!!$blog->content!!}
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="{{route('frontend.pre',['id'=> $blog->id])}}">Pre</a></li>
									<li><a href="{{route('frontend.blognext',['id' => $blog->id] )}}" onclick="nextPage()">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->
					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<form method="POST" action="{{route('frontend.blog.rate')}}" id="formRate">
								<div class="rate">
					                <div class="vote">
					                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
					                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
					                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
					                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
					                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
					                    <div class="ratings_stars" style="display: none;"><input class="rate" type="text" name="rate" value=""></div>
					                    <div class="ratings_stars" style="display: none;"><input id="blog_id" type="text" name="blog_id" value="{{$blog->id}}"></div>
					                    @auth
					                    <div class="ratings_stars" style="display: none;"><input id="user_id" type="text" name="user_id" value="{{auth()->user()->id}}"></div>
					                    @endauth
					                    <span class="rate-np">{{$tb}}</span>
					                </div> 
					            </div>
					            @csrf
							</form>
							<li class="color">({{$countBlog}} votes)</li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->
					<div class="response-area">
						<h2>3 RESPONSES</h2>
						<ul class="media-list">
							<li class="media">
								
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-two.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-four.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
						</ul>					
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-4">
								<h2>Leave a replay</h2>
								<form>
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" placeholder="write your name...">
									<div class="blank-arrow">
										<label>Email Address</label>
									</div>
									<span>*</span>
									<input type="email" placeholder="your email address...">
									<div class="blank-arrow">
										<label>Web Site</label>
									</div>
									<input type="email" placeholder="current city...">
								</form>
							</div>
							<div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<textarea name="message" rows="11"></textarea>
									<a class="btn btn-primary" href="">post comment</a>
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->
				</div>	
				<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
				<script>
					load_data();
					function load_data() {
						$.get("http://localhost:8000/api/blog/13", function(res){
					    console.log(res)
					    // res.forEach(function(item){
					    // 	console.log(item);
					    // })
					  });

						
					}
				</script>
			@endsection('content')