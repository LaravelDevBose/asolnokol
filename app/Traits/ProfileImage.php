<?php

namespace App\Traits;
use App\Merchantile;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use File;

trait ProfileImage{


	//Resize and Uplode Shop LOgo Image
	private function shopLogoUplodeAndResize($imageInfo, $folderName)
	{	
		$path = $this->distinationPath($folderName);
		$imageTypeName = 'logo';
		$imageName = $this->createImageName($imageInfo, $folderName, $imageTypeName);
		$imagePath = $path.$imageName;
		$image = Image::make($imageInfo->getRealPath())->resize(200, 200);
		$image->save($imagePath);
		return $imagePath;
	}

    //Resize and Uplode Shop Banner Image
	private function shopBannerUplodeAndResize($imageInfo, $folderName)
	{	
		$path = $this->distinationPath($folderName);
		$imageTypeName= 'banner';
		$imageName = $this->createImageName($imageInfo, $folderName,$imageTypeName);
		$imagePath = $path.$imageName;
		$image = Image::make($imageInfo->getRealPath())->resize(1280, 720);
		$image->save($imagePath);
		return $imagePath;
	}




	//make a Custom Banner Image Name
	private function createImageName($imageInfo, $folderName, $imageTypeName)
    {	
    	//get Image Mine Type
        $logoType =$imageInfo->getClientMimeType();
        $ext = substr($logoType, strrpos($logoType, '/') +1);
        //get Current Date time String
        $date = $this->currentTime();
        //concrite a new logo Name
        $newName = $date.'_'.$folderName.$imageTypeName.'.'.$ext;

        //return logo name
        return $newName;
    }


    //Image Distination url
	private function distinationPath($folderName)
	{	

		//Create image Store Path
		$path = 'public/images/'.$folderName.'/';

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