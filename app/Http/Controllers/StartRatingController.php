<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StartRating;
use App\Userlike;
use Auth;

class StartRatingController extends Controller
{
    public function ratingStore($productId, $value)
    {
    	$pvrsRate = StartRating::where('productId', $productId)->first();

    	if (is_null($pvrsRate)) {
    		
    		$rate = New StartRating;
    		$rate->productId = $productId;
    		$rate->rating = $value;
    		$rate->totalRating = $value;
    		$rate->totalRates = 1;
    		$rate->userId = Auth::user()->id.',';
    		$rate->save();

    		return redirect()->back()->with('rattingMsg', 'Thank You For Your Rating.');
    	}else{
    		$totalRating = $pvrsRate->totalRating + $value;
    		$totalRates = $pvrsRate->totalRates + 1;
    		$rating = $totalRating / $totalRates;
    		$userId = $pvrsRate->userId . Auth::user()->id.',';

    		$rateing = StartRating::find($pvrsRate->id);
    		$rateing->rating = $rating;
    		$rateing->totalRating = $totalRating;
    		$rateing->totalRates = $totalRates;
    		$rateing->userId = $userId;
    		$rateing->save();

    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function likeStore($id){
        $totalLikes = Userlike::where('productId', $id)->first();

        
        if (!empty($totalLikes)) {

            Userlike::where('productId',$id)->increment('totalLikes');
        } else {
            $like = new Userlike;
            $like->productId=$id;
            $like->totalLikes= '1';
            $like->save();
        }
        
        return redirect()->back();
    }

    
}

