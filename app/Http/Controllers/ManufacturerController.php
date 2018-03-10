<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Manufacturer;
use Session;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.manufacturer.createManufacturer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check validation For Request data If pass then go forward
        $this->chakeValidation($request);

        //get image information
        $imageInfos=$request->file('image');

        //Sent image to check validation
            $res= $this->checkImageValidaction($imageInfos);
          
            //check validation 
            if(!$res){

                //if validation pass call moveUplodeImage for move image to folder and get Image url 
                $imageUrl =$this->moveUplodeImage($imageInfos);

                //If validation pass then Save data 
                $manufacturer = new Manufacturer;
                $manufacturer->manufacturerName = $request->manufacturerName;
                $manufacturer->shortDescription = $request->shortDescription;
                $manufacturer->image = $imageUrl;
                $manufacturer->publicationStatus = $request->publicationStatus;
                $manufacturer->save();
            }

        //Return redirect to Back with Success message
        return redirect()->back()->with('message', 'Company Information Save SuccessFully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        //get all data 
        $manufacturies = Manufacturer::all();

        //return view with data
        return view('backEnd.manufacturer.manageManufacturer', ['manufacturies'=> $manufacturies ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //Find Details by id
        $manufacturerById = Manufacturer::find($id);
        //return view with data
        return view('backEnd.manufacturer.editManufacturer', ['manufacturerById'=> $manufacturerById ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

            // If has new file call uplodeNewImage function
            $imageUrl=$this->uplodeNewImage($request);

            //Update data with New image
            $manufacturer = Manufacturer::find($request->manufacturerId);
            $manufacturer->manufacturerName = $request->manufacturerName;
            $manufacturer->shortDescription = $request->shortDescription;
            $manufacturer->image = $imageUrl;
            $manufacturer->publicationStatus = $request->publicationStatus;
            $manufacturer->save();

        // return manage page with Successfull message
        return redirect('/manufacturer.manage')->with('message', 'Company Information Update SuccessFully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){  

        //find manufacturer Info By $id
        $manufacturerById = Manufacturer::find($id);

        //Call destroyPvesImage to Delete Image
        $res = $this->destroyPvesImage($manufacturerById);

        // If delete  Enter If Condition
        if(!$res){

            //Again Find and Get manufacturer by Id And Delete All info 
            $manufacturerById = Manufacturer::find($id);
            $manufacturerById->delete();
        }
        //If Can not Delete Enter Else Condition 
        else{
            //return back With message
             return redirect()->back()->with('message', 'Oops Something Wrong !');
        }

        //Return Manage page With Success message
        return redirect('/manufacturer.manage')->with('message', 'Company Information Delete SuccessFully !');
    }

    /**
     * Construct the valudation.
     *
     * @return \Illuminate\Http\Response
     */
    public function chakeValidation($request)
    {
        //Create validation
        $validation=Validator::make($request->all(),[
        'manufacturerName' => 'required',
        'shortDescription' => 'required|max:5000',
        'image' => 'required|image',
        'publicationStatus' => 'required',

        ]);

    //IF validatio fails back to previes pages If pass than go function
        if($validation->fails()){
            return redirect()->back()
                ->withErrors($validation) 
                ->withInput();
        };
            
    }

    private function checkImageValidaction($imageInfos){
        //check Image File type 
        $this->checkFileType($imageInfos);
    }

    private function checkFileType($imageInfos){
        //get file type form imageInfos 
        $FileType = $imageInfos->getClientMimeType();

        //check Images file type
        if(!$FileType){

            //If fails return back with status messages
            return redirect()->back()->with('status', 'valid Image File !');
        }
        else{

            //If pass then Forward to checkFileExtention function
            $this->checkFileExtention($imageInfos);
        }
    }

    private function checkFileExtention($imageInfos){

        //get imageExtention form imageInfos
        $imageExtention =$imageInfos->getClientOriginalExtension();

        //check image jpg or png...
        if($imageExtention !='jpg'||$imageExtention !='png'){

            //If image not jpg or png then back to previous page with status message
            return redirect()->back()->with('status', ' Use jpg or png Image File');
        }
        else{
            //If image is png or jpg then Forward to checkImageSize function
            $this->checkImageSize($imageInfos);
        }
    }

    private function checkImageSize($imageInfos){
        //get image Size 
        $imageSize = getimagesize($imageInfos);

        //Check Image Size is it getter then 50000 bit or not
        if($imageSize >50000){
            //If imageSize is getter then 50000 bit then back to Previous page with status message 
            return redirect()->back()->with('status', 'Image  are too large File');
        }
        
    }

    private function moveUplodeImage($imageInfos){
        //Get Image name
        $imageName =$imageInfos->getClientOriginalName();

        //Define Uplode path 
        $uploadPath = 'public/images/ManufacturerImages/';

        //move to Define folder
        $imageInfos->move($uploadPath, $imageName);

        //return totel url to join uplodepath and imageName
        return $imageUrl = $uploadPath . $imageName;

    }

    private function uplodeNewImage($request){

        //get Previous Image Information (must be change model name and colame Id)
        $imageinfoById = Manufacturer::find($request->manufacturerId);

        //check has new file or not  ...? If has new file the Enter into If Condition
        if($request->hasFile('image')){
            //Get all Infomation About new image
            $newimageInfos=$request->file('image');

            //check Images validation If pass Validation go forward
            if(!$this->checkImageValidaction($newimageInfos)){

                //Distroy Previous Image
                $destryOldImage = $this->destroyPvesImage($imageinfoById);

                //check can Destroy Previous or not
                if(!$destryOldImage){

                    //If Destroy Previous images then move to folder call moveUplodeImages function
                    $imageUrl= $this->moveUplodeImage($newimageInfos);
                }else{
                    //If Can not delete Image then back to previous page with message
                    return redirect()->back()->with('message', 'Can Not Delete Previous Images !');
                }
            }
        }
        //If has no new file then Enter into Else Condition
        else{
            //get previous image url 
            $imageUrl= $imageinfoById->image;
        }

        //return Images url 
        return $imageUrl;

    }

    private function destroyPvesImage($imageinfoById){
        //Destroy Image
        unlink($imageinfoById->image);
    }
}
