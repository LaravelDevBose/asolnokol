<?php

namespace App\Traits;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use File;
trait ProductImage{


	private function resizeAndStoreImagesInFolder($imagesInfos)
	{
		$imageUrl = array();
		$i=0;

		foreach ($imagesInfos as $imagesInfo) {
			$imageUrl[$i] = $this->imageUplodeAndResize($imagesInfo);
			$i++;
		}

		return $imageUrl;
		dd($imageUrl);
	}


    //Resize and Uplode Shop Banner Image
	private function imageUplodeAndResize($imageInfo)
	{	
		$path = $this->distinationPath();
		$imageName = $this->createImageName($imageInfo);
		$imagePath = $path.$imageName;
		$image = Image::make($imageInfo->getRealPath())->resize(500, 400);
		$image->save($imagePath);
		return $imagePath;
	}


	//make a Custom Banner Image Name
	private function createImageName($imageInfo)
    {	
    	
        //get Current Date time String
        $date = $this->currentTime();
        //concrite a new logo Name
        $newName = $date.'_'.$imageInfo->getClientOriginalName();

        //return logo name
        return $newName;
    }


    //Image Distination url
	private function distinationPath()
	{	

		//Create image Store Path
		$path = 'public/images/ProductImages/';

		//cheak Folder all ready Exits or not
		if(!File::exists($path)){
			//if no Folder Exits then Create new One
			File::makeDirectory($path);
		}
		
		//Return the folder path
		return $path;
	}


	// get Current Time Function

	private function currentTime()
	{
		return Carbon::now()->format('Ymdhis');
	}
}