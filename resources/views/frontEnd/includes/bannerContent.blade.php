<!--banner-info-->
<div class="banner-info">
  <h1 ><a href="{{ url('/') }}">ASOL <span class="logo-sub">VS</span> NOKOL </a></h1>
  	{!! Form::Open(['url'=>'/search','method'=>'POST']) !!}
		<div class="search-two">
		<select id="country" name="manufacturerId" onchange="change_country(this.value)" class="frm-field required">
			<option value="null">Brand</option>
		@foreach( $manufacturers as $manufacturer )
			<option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturerName }}</option>
		@endforeach
		</select>
	</div>
	<div class="section_room">
		<select id="country" name="categoryId" onchange="change_country(this.value)" class="frm-field required">
			<option value="null">Category</option>
		@foreach( $categories as $category )
			<option value="{{ $category->id }}">{{ $category->categoryName }}</option>   
		@endforeach
		</select>
	</div>

		{!! Form::submit('Search') !!}
		
		<div class="clearfix"></div>
	{!!Form::close()!!}

</div>
				<!--//banner-info-->	