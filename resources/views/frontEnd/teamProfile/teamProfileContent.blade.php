@extends('frontEnd.master')

@section('title')
Team Profile| Aslol Vs Nokol
@endsection

@section('mainContent')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/teamprofile/asolnokol_team.css')}}" media="all">

<!--[START] team profile -->
<div id="team-profile">
    <div class=" row">
        <div class="col-md-6 col-md-offset-3" style="border-bottom: 1px solid #e16b5b;">
            <h1 style="padding-top:1em; font-family:Consolas, Arial, Helvetica, sans-serif;  " class="tmp text-center text-success">Our Team Profile</h1>
        </div>
    </div>
                  
    <div class="profile-container">
    @foreach($memberCategories as $memberCategory )         	
    	<h2>{!! $memberCategory->categoryHeadding !!}</h2>
    	<div class="directors-board">
        <?php $teamMembers=DB::table('team_members')->where('memberCategoryeId',$memberCategory->id)->orderBy('position', 'asc')->get(); ?>
        @foreach($teamMembers as $teamMember)
            <div class="member">
                <?php 
                    $i=1;  
                    if(file_exists($teamMember->image)){
                        $teamMemberImage = $teamMember->image;
                    }else{
                        $teamMemberImage = 'public/frontEnd/images/placeholder.jpg';
                    }
                ?>
            	<img src="{{ asset( $teamMemberImage)}}" title="" alt="{{ $teamMember->memberName }}" >
            	<h3><br><b>{{ $teamMember->memberName }}</b></h3>  
                <h3><span>{{ $teamMember->position }}</span><br> </h3>
            </div>
        @endforeach
            <div style="clear:both"></div>
        </div>
    @endforeach
    </div>
</div> 
<!--[END] team profile -->
<div style="clear:both"></div>


@endsection