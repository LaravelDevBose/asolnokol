<div class="latestProduct">
	@foreach($letestProducts as $letestProduct )
		<div class="col-md-3 col-sm-3 col-xs-6 divider">
			<div class="focus-border fixed-hight">

				<?php  
					$productImage=DB::table('products_images')->where('productId', $letestProduct->id)->value('imagePath'); 
					if(!file_exists($productImage)){
						$productImage = 'public/frontEnd/images/placeholder.jpg';	
						
					}

				?>
				<div class="imageStyle" ><a href="{{ url('/singel.product/'.$letestProduct->id ) }}"><img src="{{ asset( $productImage )}}" alt="{!! $letestProduct->productName !!}"></a></div>
				<div class="clearfix"></div>
				<div class="heading"><a href="{{ url('/singel.product/'.$letestProduct->id ) }}">{!! $letestProduct->productName !!}</a></div>
				<div class="clearfix"></div>

			</div>
		</div>
	@endforeach
		
</div>
	
<div class="clearfix"></div>
		
