@extends('layout')

@section('seo')
  <title>О нас</title>
  <meta name="description" content="О нас">
@endsection

@section('content')

	<div id="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Single Post</h1>
					<div class="line"></div>
					<span>Praesent volutpat nisi sed imperdiet facilisis felis turpis fermentum lectus</span>
					<div class="page-active">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><i class="fa fa-dot-circle-o"></i></li>
							<li><a href="single-blog.html">Blog Post</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<h1>Шаблон Новости</h1>

	<section class="single-blog">
		<div class="container">
			<div class="row">
				<div id="blog-post" class="col-md-8">
					<div class="blog-item">
						<img src="http://dummyimage.com/770x390/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<div class="post-info">
								<ul>
									<li>May 14, 2015</li>
									<li>Posted by <a href="#">Admin</a></li>
								</ul>
								<div class="tittle">
									<a href="single-blog.html"><h2>Normcore pour-over taxidermy twee</h2></a>
								</div>
							</div>
							<p>Phasellus hendrerit eros eget massa maximus placerat. Etiam vel est tristique, iaculis orci rhoncus, faucibus orci. Fusce pharetra augue ac blandit posuere. Duis urna neque, posuere vitae facilisis et, sodales ac eros. Donec quis congue elit. Fusce ultrices ex vitae turpis cursus, eget venenatis tellus posuere.<br><br>Pellentesque iaculis fermentum augue, volutpat lobortis ipsum pretium in. Aliquam pulvinar lorem non ex malesuada, eget ultrices eros feugiat. Morbi in sollicitudin leo.</p><h6>Nam porttitor metus vitae faucibus cursus</h6><p>Vivamus et orci ac magna elementum faucibus rutrum vitae risus. Aenean turpis mi, efficitur ac enim ac, efficitur lobortis diam. Proin tempor egestas urna, blandit vestibulum purus volutpat ut.<br><br>Ut egestas consequat urna non sagittis. Nulla ut velit nec sapien sollicitudin convallis. Duis fermentum suscipit magna a eleifend. Duis in porta ipsum, eu condimentum felis. Quisque venenatis pretium quam, et sollicitudin massa sollicitudin sed. Donec condimentum risus at mattis venenatis.</p>
							<blockquote><em>"</em>Vivamus et orci ac magna elementum faucibus rutrum vitae risus. Aenean turpis mi, efficitur enim ac, efficitur lobortis diam. Proin tempor egestas urna, blandit.</blockquote><h6>Nam porttitor metus vitae faucibus cursus</h6><p>Mauris vitae viverra metus. In hac habitasse platea dictumst. Integer commodo sapien massa, vitae consequat turpis efficitur nec. Sed eleifend magna ornare, vulputate lectus eu, maximus diam. Etiam congue, tellus posuere tincidunt dignissim, felis ante sollicitudin ante, ac porta risus orci quis ipsum. Donec purus sem, viverra vel convallis.</p>
						</div>
					</div>
					<div class="author-writen">
						<img src="http://dummyimage.com/55x55/cccccc/fff.jpg.png" alt="">
						<div class="border-button">
							<a href="#">Share Post</a>
						</div>
						<span>written by</span>
						<h4>Scott Fisher</h4>
					</div>
					<div class="comments">
						<h2>3 commentson this post</h2>
						<div class="comment-item first-comment">
							<img src="http://dummyimage.com/55x55/cccccc/fff.jpg" alt="">
							<div class="reply-button">
								<a href="#">Reply</a>
							</div>
							<h4>Lydia Billiot</h4>
							<span><i class="fa fa-clock-o"></i>2m</span>
							<p>Mauris vitae viverra metus. In hac habitasse platea dictumst. Integer commodo sapien massa, vitae consequat turs efficitur nec. Sed eleifend magna ornare.</p>
						</div>
						<div class="comment-item second-comment">
							<img src="http://dummyimage.com/55x55/cccccc/fff.jpg" alt="">
							<div class="reply-button">
								<a href="#">Reply</a>
							</div>
							<h4>Thomas  Perez</h4>
							<span><i class="fa fa-clock-o"></i>44m</span>
							<p>Mauris vitae viverra metus. In hac habitasse platea dictumst.</p>
						</div>
						<div class="comment-item third-comment">
							<img src="http://dummyimage.com/55x55/cccccc/fff.jpg" alt="">
							<div class="reply-button">
								<a href="#">Reply</a>
							</div>
							<h4>Curtis Reid</h4>
							<span><i class="fa fa-clock-o"></i>2m</span>
							<p>Mauris vitae viverra metus. In hac habitasse platea dictumst. Integer commodo sapien massa.</p>
						</div>
					</div>
					<div class="leave-comment">
						<h2>Leave a comment</h2>
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="name" name="s" placeholder="Your Name" value="">
							</div>
							<div class="col-md-6">
								<input type="text" class="name" name="s" placeholder="Your Email" value="">
							</div>
							<div class="col-md-12">
								<input type="text" class="name" name="s" placeholder="Website" value="">
							</div>
							<div class="col-md-12">
								<textarea id="message" class="message" name="message" placeholder="Your Message"></textarea>
							</div>
							<div class="col-md-12">
								<div class="advanced-button">
									<a href="#">Submit Now<i class="fa fa-paper-plane"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="side-bar" class="col-md-4">
					<div class="search-box">
						<input type="text" class="name" name="s" placeholder="What are you looking for?" value="">
						<div class="simple-button">
							<a href="#">Search</a>
						</div>
						<i class="fa fa-search"></i>
					</div>
					<div class="sidebar-widget categories">
						<h4>Categories</h4>
						<ul>
							<li><a href="#">Branding</a></li>
							<li><a href="#">Company News</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Development</a></li>
							<li><a href="#">Business</a></li>
						</ul>
					</div>
					<div class="sidebar-widget latest-posts">
						<h4>Latest Posts</h4>
						<div class="latest-item">
							<img src="http://dummyimage.com/64x64/cccccc/fff.jpg" alt="">
							<a href="single-blog.html"><h6>Hella Kogi Whatever, Small Batch Pickled</h6></a>
							<ul>
								<li><i class="fa fa-calendar"></i>24 Sep,2015</li>
								<li><i class="fa fa-comments-o"></i>2 comments</li>
							</ul>
						</div>
						<div class="latest-item">
							<img src="http://dummyimage.com/64x64/cccccc/fff.jpg" alt="">
							<a href="single-blog.html"><h6>Normcore Pour-Over Taxidermy Twee</h6></a>
							<ul>
								<li><i class="fa fa-calendar"></i>21 Sep,2015</li>
								<li><i class="fa fa-comments-o"></i>0 comments</li>
							</ul>
						</div>
					</div>
					<div class="sidebar-widget recent-tweets">
						<h4>Recent Tweets</h4>
						<div class="recent-item first-item">
							<i class="fa fa-twitter"></i>
							<p><a href="#">@Maecenasa</a> sapien gravida, vehicula tellus in sag felis. Aliquam massa</p>
							<span>37 minutes ago</span>
						</div>
						<div class="recent-item">
							<i class="fa fa-twitter"></i>
							<p><a href="#">@Maecenasa</a> sapien gravida, vehicula tellus in sag felis. Aliquam massa</p>
							<span>37 minutes ago</span>
						</div>
					</div>
					<div class="sidebar-widget tags">
						<h4>Tags Cloud</h4>
						<ul>
							<li><a href="#">clean</a></li>
							<li><a href="#">minimal</a></li>
							<li><a href="#">technology</a></li>
							<li><a href="#">videos</a></li>
							<li><a href="#">illustration</a></li>
							<li><a href="#">high resolution</a></li>
							<li><a href="#">wallpaper</a></li>
							<li><a href="#">reviews</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection