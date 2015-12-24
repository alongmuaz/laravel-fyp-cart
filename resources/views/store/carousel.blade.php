	<!-- Owl Carousel Starts -->
		<div class="container">

			<div class="rp">
				<!-- Recent News Starts -->
				<h4 class="title">Recent Items</h4>
				<div class="recent-news block">
						<!-- Recent Item -->

						<div class="recent-item">
							<div class="custom-nav">
								<a class="prev"><i class="fa fa-chevron-left br-lblue"></i></a>
								<a class="next"><i class="fa fa-chevron-right br-lblue"></i></a>
							</div>

							<div id="owl-recent" class="owl-carousel">
								@foreach($pros as $product)
								<!-- Item -->
								<div class="item">
									<a href="{{url('store/view/'.$product->id)}}"><img src="{{asset($product->image)}}" alt="" class="img-responsive" /></a>
									<!-- Heading -->
									<h4><a href="#">{{$product->title}}<span class="pull-right">RM{{$product->price}}</span></a></h4>
									<div class="clearfix"></div>
									<!-- Paragraph -->
									<p>{{$product->info}}.</p>
								</div>
								@endforeach

							</div>
						</div>
				</div>

				<!-- Recent News Ends -->
			</div>

		</div>
<!-- Owl Carousel Ends -->
