@extends('frontEnd.master')

@section('title')
Search | Aslol Vs Nokol
@endsection

@section('mainContent')
		   <!--/search-car -->
<div class="search-car w3l">
	<div class="container">
	    <!--/search-car-inner -->
		<div class="search-car-inner w3l">
			<!--/search-car-left-nav -->
			<div class="col-md-3 search-car-left-sidebar">
				
                @include('frontEnd.includes.sidebar')
			</div>
			<!--//search-car-left-nav -->
			<!--/search-car-right-text -->
			<div class="col-md-9 search-car-right-text w3">
				<div class="well well-sm">
				<strong>Display</strong>
					<div class="btn-group">
						<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
						</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm two"><span
							class="glyphicon glyphicon-th"></span>Grid</a>
					</div>
				</div>
				<div id="products" class="row list-group">
			@if(is_null($searchProducts))
<!-- 
				<div class="alert alert-danger text-center">
					<h4> Your Searchig product is not match </h4>
					<p> Please chack Your Inforamtion </p>
				</div> -->

				jaslfdhashdfhsdaf

			@else

                @foreach( $searchProducts as $searchProduct )
					<div class="item  col-xs-4 col-lg-4">
						<div class="thumbnail" >
                        <?php  
                            $productImage=DB::table('products_images')->where('productId', $searchProduct->id)->value('imagePath'); 
                            if(!file_exists($productImage)){
                                $productImage = 'public/frontEnd/images/placeholder.jpg';   
                               
                            }

                        ?>

							<a href="{{ url('/singel.product/'.$searchProduct->id )}}" data-toggle="modal" data-target="#myModal6"><img class="group list-group-image" style="height:150px;" src="{{ asset( $productImage )}}" alt="{{ $searchProduct->productName }}"></a>
                            <div class="table-text">
                                <h4 ><a href="{{ url('/singel.product/'.$searchProduct->id )}}" title="Maruti Suzuki 800 AC" class="click-search"><span class="spancarname">{{ $searchProduct->productName }}</span></a></h4>
                                <?php $companyName = DB::table('manufacturers')->where('id' , $searchProduct->manufacturerId)->first(); ?>
                                <p class="gridViewPrice hide">
                                    <a href="used_cars.html">
                                        <span class="rupee-lac">{{ $companyName->manufacturerName }}</span> 
                                    </a>
                                </p>  
                                <div class="other-details">
                                    <a href="used_cars.html">
                                      <span class="rupee-lac slprice">{{ $companyName->manufacturerName }}</span> 
                                    </a>  
									<div class="clearfix"></div>												
                                    <a href="{{ url('/singel.product/'.$searchProduct->id )}}">
                                     <p class="listing-item-kms"><span class="slkms">{!! $searchProduct->shortDescription !!}</span></p>
                                    <p class="text-light-grey deliverytext"></p>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="list-form">
									<div class="get-one"><a href="{{ url('/singel.product/'.$searchProduct->id )}}" class="read hvr-shutter-in-horizontal scroll">Read More</a></div>
                                    <div class="clearfix"></div>
                                </div>
                			</div>
						</div>
					</div>
				@endforeach
				</div>
			@endif
			</div>
			<!--//search-car-right-text -->
			<div class="clearfix"></div>
		</div>
		<!--//search-car-inner -->
	</div>
</div>
 <!--//search-car -->


@endsection