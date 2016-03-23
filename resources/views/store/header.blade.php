		<!-- Header starts -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<!-- Logo. Use class "color" to add color to the text. -->
						<div class="logo">
							<h1>@if (count($set) > 0 ) {{$set->site_title}} @endif</h1>
							<p class="meta">-</p>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-4">

						<!-- Search form -->
						{!! Form::open(array('url' => 'store/search', 'method' => 'get')) !!}
						<div class="input-group">
							{!! Form::text('keyword',null,['class'=>'form-control', 'placeholder' => 'Search']) !!}
						<span class="input-group-btn">
						<button type="submit" class="btn btn-default">Search</button>
								</span>
					</div>

					{!! Form::close() !!}
						<div class="hlinks">
							<span>
								<!-- item details with price -->
									@if($cart_content->isEmpty())
										Your Basket Is Empty <i class="fa fa-shopping-cart"></i>
									@else
									<a href="#cart" role="button" data-toggle="modal">
									{{$count}} Item(s) in your <i class="fa fa-shopping-cart"></i>
										@endif
								</a>
							</span>
						</div>

					</div>
				</div>
			</div>
		</header>
		<!--/ Header ends -->