@extends('frontend.layouts.app')
@section('title')
	Blog | Shoppe
@endsection('title')
@section('content')
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						@foreach($blog as $value)
						<div class="single-blog-post">
							<h3>{{$value->title}}</h3>
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
							<a href="{{route('frontend.blogsingle',['id' => $value->id])}}">
								<img src="storage/blog/image/{{$value->image}}" width="710" height="325" alt="">
							</a>
							<p>{{$value->description}}</p>
							<a  class="btn btn-primary" href="{{route('frontend.blogsingle',['id' => $value->id])}}">Read More</a>
						</div>
						@endforeach
						<div class="pagination-area">
							<ul class="pagination">
								{{$blog->links()}}							
							</ul>
						</div>
					</div>


@endsection('content')

