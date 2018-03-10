<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductReview;
use Illuminate\Support\Facades\Validator;

class ProductReviewController extends Controller
{
    public function reviewStore(Request $request)
    {	
    	
    	$validation=Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required|string',
            ]);

    	if($validation->passes()){
    		$store = New ProductReview;
	    	$store->productId = $request->productId;
	    	$store->name = $request->name;
	    	$store->email = $request->email;
	    	$store->review = $request->review;
	    	$store->save();
	    	return redirect()->back()->with('msg','Thank You For Review');
    	}else{
    		return redirect()->back()->withInput($request->all())->withErrors($validation);
    	}
    	
    }
}
