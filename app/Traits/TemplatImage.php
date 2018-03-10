<?php

namespace App\Traits;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use File;

trait TemplatImage{

    //Resize and Uplode Shop LOgo Image
	private function shopLogoUplodeAndResize($imageInfo, $folderName)
	{	
		$path = $this->distinationPath($folderName);
		$imageName = $this->createNewImageName($imageInfo);
		$imagePath = $path.$imageName;
		$image = Image::make($imageInfo->getRealPath())->resize(300, 250);
		$image->save($imagePath);
		return $imagePath;
	}

	//Image Distination url

	private function distinationPath($folderName)
	{		
		$path = 'public/images/'.$folderName.'/';
		if(!File::exists($path)){
			File::makeDirectory($path);
		}
		
		return $path;
	}

	//make a image new name
	private function createNewImageName($imageInfo)
    {
        $imageName =$imageInfo->getClientOriginalName();
        $date = $this->currentTime();
        $newName = $date.'_'.$imageName;

        return $newName;
    }

	// get Current Time Function

	private function currentTime()
	{
		return Carbon::now()->format('Ymdhis');
	}

}