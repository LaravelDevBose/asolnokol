@extends('frontEnd.master')

@section('title')
Products | Aslol Vs Nokol
@endsection

@section('mainContent')
		   <!--/search-car -->
<div class="search-car w3l">
	<div class="container">
	    <!--/search-car-inner -->
		<div class="search-car-inner w3l">
			<!--/search-car-left-nav -->
			<div class="col-md-3 search-car-left-sidebar">
				<section class="sky-form">
				@if(empty($categoryeId))
					<h4>Category Name</h4>
                    <div class="form-inner">
                    	<ul style="list-style:none;">
                    	@foreach($categories as $category )
                        	<li> <b class="text text-success">*</b>
                        		<a style="text-size:18px; padding:5px;" href="{{ url('view.product/'.$category->id.'/'.$menufacturerId) }}">
		                            {{ $category->categoryName }}
		                        </a>
                        	</li>
                    	@endforeach
                    	</ul>
                    </div>

                    <h4>Company Name</h4>
                    <div class="form-inner">
                    	<ul style="list-style:none;">
	                    @foreach($manufacturers as $manufacturer)
	                    	<li><b class=" text  text-success" >*</b>
		                        <a style="text-size:18px; padding:5px;" href="{{ url('view.manufacturer.product/'.$manufacturer->id) }}">
		                            {{ $manufacturer->manufacturerName }}
		                        </a>
	                        </li>
	                    @endforeach
                    	</ul>
                    </div>
				@else
                    <h4>Company  Name</h4>
                    <div class="form-inner">
                    	<ul style="list-style:none;">
                    @foreach($manufacturers as $manufacturer)
                    		<li>
		                        <b class="text  text-danger" >*</b><a href="{{ url('view.product/'.$categoryeId.'/'.$manufacturer->id) }}">
		                            {{ $manufacturer->manufacturerName }}
		                        </a>
                        	</li>
                    @endforeach
                    	</ul>
                    </div>

                    <h4>Categoy Name</h4>
                    <div class="form-inner">
                    	<ul style="list-style:none;">
                    	@foreach($categories as $category )
                        	<li>
                        		<b class="text text-success" >*</b><a style="text-size:18px; padding:5px;" href="{{ url('view.category.product/'.$category->id ) }}">
		                            {{ $category->categoryName }}
		                        </a>
                        	</li>
                    	@endforeach
                    	</ul>
                    </div>
                @endif
                </section>
                @include('frontEnd.includes.sidebar')
			</div>
			<!--//search-car-left-nav -->
			<!--/search-car-right-text -->
			<div class="col-md-9 search-car-right-text w3">
				<div class="well well-sm">
				<strong>Display</strong>
					<div class="btn-group">
						<a href="#" id="list" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-th-list"></span>List
                        </a> 
                        <a href="#" id="grid" class="btn btn-default btn-sm two">
                            <span class="glyphicon glyphicon-th"></span>Grid
                        </a>
					</div>
				</div>
				<div id="products" class="row list-group">
                @foreach( $productsById as $product )
					<div class="item  col-xs-4 col-lg-4"> 
						<div class="thumbnail" >
                        <?php  
                            $productImage=DB::table('products_images')->where('productId', $product->id)->value('imagePath'); 
                            if(!file_exists($productImage)){
                                $productImage=DB::table('fack_products_images')->where('productId', $product->id)->value('fackProductImagePath');

                                if(!file_exists($productImage)){
                                    $productImage = 'public/frontEnd/images/placeholder.jpg';   
                                }
                            }

                        ?>

							<a href="{{ url('/singel.product/'.$product->id )}}" data-toggle="modal" data-target="#myModal6"><img class="group list-group-image" style="height:150px;" src="{{ asset( $productImage )}}" alt="{{ $product->productName }}"></a>
                            <div class="table-text">
                                <h4 ><a href="{{ url('/singel.product/'.$product->id )}}" title="" class="click-search"><span class="spancarname">{{ $product->productName }}</span></a></h4>
                                <?php $companyName = DB::table('manufacturers')->where('id' , $product->manufacturerId)->first(); ?>
                                <p class="gridViewPrice hide">
                                    <a href="#">
                                        <span class="rupee-lac">{{ $companyName->manufacturerName }}</span> 
                                    </a>
                                </p>  
                                <div class="other-details">
                                    <a href="#">
                                      <span class="rupee-lac slprice">{{ $companyName->manufacturerName }}</span> 
                                    </a>  
									<div class="clearfix"></div>												
                                    <p class="short-des-pro">{!! $product->shortDescription !!}</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="list-form" style="margin-top:1em;">
									<div class="get-one"><a href="{{ url('/singel.product/'.$product->id )}}" class="read hvr-shutter-in-horizontal scroll">Read More</a></div>
                                    <div class="clearfix"></div>
                                </div>
                			</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
			<!--//search-car-right-text -->
			<div class="clearfix"></div>
		</div>
		<!--//search-car-inner -->
	</div>
</div>
 <!--//search-car -->

  <script>
  $(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>


@endsection