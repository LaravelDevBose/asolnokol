<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\BlogContent;
use App\BlogImage;
use Session;
use DB;

class BlogContentController extends Controller
{
	


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        return view('backEnd.blogContent.createBlogContent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //check Valodation Input Data
        $validator = $this->chakeValidation($request);
        if($validator->passes()){
            //move Information Supergobel $File to local $files variable
            $imagesInfos=$request->file('image');
            //couent total file 
            $totalcount= count($imagesInfos);
            //check total File
            if (!empty($imagesInfos)) {
                
                //Check Images validation (via function checkImages($imageInfos) )
                $validatecount=$this->checkImages($imagesInfos);

                if ($totalcount == $validatecount) {

                    //If validation Pass Store data (Vie function produtStore($reuest) ) and get product Id
                    //Get product Id Form  function 
                    $dataId = $this->DataStore($request);

                    //Move Images In Directory Folder(via function storeImagesInFolder($files) ) 
                    //And get $imagesUrl array
                    $imagesUrl = $this->storeImagesInFolder($imagesInfos);

                    $this->storeImages($imagesInfos ,$imagesUrl, $dataId);

                        //return Previous pages with Success mesages
                    return redirect()->back()->with('success', 'Blog Information Store SuccessFully !');
                }
                else{
                    //If Validation Fails Back to Previous pages with Erros Messages
                    return redirect()->back()->with('unsuccess', 'Pleass Uplode Valid Image !');
                }
            }else{
                return redirect('/blog.content.insert')
                ->withErrors('unsuccess', 'Image Are Requierd !')
                ->withInput();
            }
        }else{
            return redirect('/blog.content.insert')
                ->withErrors($validator) 
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        //Reitrive Data And view

        $datas = BlogContent::paginate(15);

        return view('backEnd.blogContent.manageBlogContent',['datas' => $datas]);
    }

    public function fullView($id){
        //join all Relative table
        $dataById = BlogContent::where('id', $id)->first();


        //get Product Images where  product id equel $id
        $dataImages = BlogImage::where('blogId', $id)->get();

        //return view with data
        return view('backEnd.blogContent.viewBlogContent',['dataById' => $dataById , 'dataImages'=>$dataImages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        //Retrive data where $id
        $dataById = BlogContent::where('id', $id)->first();
        $dataImages = BlogImage::where('blogId', $id)->get();

        return view('backEnd.blogContent.editBlogContent',['dataById'=>$dataById, 'dataImages'=>$dataImages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        //check Valodation Input Data
        $validator = $this->chakeValidation($request); 
        if($validator->passes()){

            //move Information Supergobel $File to local $files variable
            $imagesInfos=$request->file('image');

            //couent total file 
            $totalcount= count($imagesInfos);

            if(!empty($imagesInfos)){
                
                //Check Images validation (via function checkImages($imageInfos) )
                $validatecount=$this->checkImages($imagesInfos);

                if ($totalcount == $validatecount) {

                    //If validation Pass Update data (Vie function produtStore($reuest) ) and get product Id
                    //Get product Id Form  function 
                    $dataId = $this->dataUpdate($request);

                    //Move Images In Directory Folder(via function storeImagesInFolder($files) ) 
                    //And get $imagesUrl array
                    $imagesUrl = $this->storeImagesInFolder($imagesInfos);

                    $this->storeImages($imagesInfos ,$imagesUrl, $dataId);

                        //return Previous pages with Success mesages
                    return redirect('/blog.content.manage')->with('success', 'Product Information Store SuccessFully !');
                }
                else{
                    //If Validation Fails Back to Previous pages with Erros Messages
                    return redirect()->back()->with('unsuccess', 'Pleass Uplode Valid Image !');
                }
            }else{
                //Update Product Information
                $this->dataUpdate($request);

                //return Previous pages with Success mesages
                return redirect('/blog.content.manage')->with('success', 'Product Information Store SuccessFully !');
            }
        }else{
            return redirect()
                ->back()
                ->withErrors($validator) 
                ->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){  

        //Call destroyImages to Delete Image
        $res = $this->destroyImages($id);

        // If delete  Enter If Condition
        if(!$res){

            //Again Find and Get manufacturer by Id And Delete All info 
            $dataById = BlogContent::find($id);
            $dataById->delete();
        }
        //If Can not Delete Enter Else Condition 
        else{
            //return back With message
             return redirect()->back()->with('unsuccess', 'Oops Something Wrong !');
        }

        //Return Manage page With Success message
        return redirect('/blog.content.manage')->with('success', 'Company Information Delete SuccessFully !');
    }

    private function DataStore($request){

        //Store Data via Model file 
        $data = new BlogContent;
        $data->authorName = $request->authorName;
        $data->blogTitel = $request->blogTitel;
        $data->shortDescription = $request->shortDescription;
        $data->longDescription = $request->longDescription;
        $data->publicationStatus = $request->publicationStatus;
        $data->save();

        //get Product id 
        $dataId = $data->id;
        //return Product Id
        return $dataId;
        
    }

    private function dataUpdate($request){
        //Store Data via Model file 
        $data = BlogContent::find($request->blogId);
        $data->authorName = $request->authorName;
        $data->blogTitel = $request->blogTitel;
        $data->shortDescription = $request->shortDescription;
        $data->longDescription = $request->longDescription;
        $data->publicationStatus = $request->publicationStatus;
        $data->save();;

        //get Product id 
        $dataId = $data->id;
        //return Product Id
        return $dataId;
    }

    private function storeImages($imagesInfos ,$imagesUrl, $dataId){
        //Declear $i
        $i= 0;

        //Start foreach Loop 
        foreach ($imagesInfos as $imageInfos) {
            //get Original Name Form $file as $imageName
            //get Image Url form $imageUrl[$i] as $imageUrl
            //store data Via ProductImage Model
            $dataImage = new BlogImage ;
            $dataImage->blogId = $dataId;
            $dataImage->imageName = $imageInfos->getClientOriginalName();
            $dataImage->imagePath = $imagesUrl[$i];
            $dataImage->save();

            //Incress $i
            $i++;
        }    
    }



    private function destroyImages($dataId){
        //find product Info By $id
        $dataImagesById = BlogImage::where('blogId',$dataId)->get();

        //Create Forecah Loop 
        foreach ($dataImagesById as $dataImageById) {
            $this->destroyPvesImage($dataImageById);
            $dataImage = BlogImage::find( $dataImageById->id );
            $dataImage->delete();
        }  
    }

     /**
     * This Function Is Delete Image By It Id 
     *In here You Change The Model Name If You r Not Define It Befor
     * With Out Model Name Nthig Change A singel Word
     */

    public function deleteSingelImage($id){

        $dataImageById = BlogImage::find($id);
        $this->destroyPvesImage($dataImageById);

        $dataImage = BlogImage::find($id);
        $dataImage->delete();

        return redirect()->back()->with('success', 'Image Delete SuccessFully !');
    }


    /**
     * Construct the valudation.
     *
     * @return \Illuminate\Http\Response
     */
    public function chakeValidation($request){

        //Create validation
        $validation=Validator::make($request->all(),[
        'authorName' => 'required|min:3|max:50',
        'blogTitel' => 'required',
        'shortDescription' => 'required|max:500',
        'longDescription' => 'required',
        'publicationStatus' => 'required',

        ]);

        //return $validation Result
        return $validation ;        
    }

     /**
     * Check Images By Foreach loop.
     *Also chaeck Imahe validation 
     * 
     */
    private function checkImages($imagesInfos){

        //decler a veriable validatecount = 0
        $validatecount = '0';
        
            //If not Empty then mack a foreach loop
            foreach ($imagesInfos as $imageInfos) {
                //Call checkImageValidation one by one
                $validation=$this->checkImageValidaction($imageInfos);
                if(!$validation){
                    //cout incress
                    $validatecount++;
                }
            }

        //return $validatecount
        return $validatecount;
    }

     /**
     * Images Are Store In Folder 
     *And Return Images Url .
     * Nathing to Change In here
     */

    private function storeImagesInFolder($imagesInfos){ 

	    $totalcount= count($imagesInfos);
	    //declear $count and $i variable
	    $i=0;

	    //make $imagesUrl array variable 
	    $imagesUrl = array();

	    //make foreach loop 
	    foreach ($imagesInfos as $imageInfos) {
	        //call function moveUplodeImage() move image to folder 
	        //And get image url And put In $imagesUrl arrey via Index
	        $imageUrl = $this->moveUplodeImage($imageInfos);

	        //Ckeck its Success to move
	        if (!empty($imageUrl)) {
	            //move imageUrl to ImagesUrl Array
	            $imagesUrl[$i]= $imageUrl;

	            //Count variable incress
	            $i++;
	        }    
	    }

	    //If totalFiles == $count 
	    if ($totalcount == $i) {
	        //return $imagesUrl array
	        return $imagesUrl;
	    }else{
	        
	        //return Previous Page with Unsuccess message
	        return redirect()->back()->with('unsuccess', 'Oops All Images Are Not valid to Store. Plz Check ! ');
	    }

    }
     /**
     * Check Image validation By Call one by one Function
     *Where hase nthing to Change
     * 
     */

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
        if($imageSize > 50000){
            //If imageSize is getter then 50000 bit then back to Previous page with status message 
            return redirect()->back()->with('status', 'Image  are too large File');
        }
        
    }

     /**
     * here Just Change UploadPath If You need
     * In this Function Get Images Orginal Name
     *And Store it In Alocated Folder 
     */

    private function moveUplodeImage($imageInfos){
        //Get Image name
        $imageName =$imageInfos->getClientOriginalName();

        //Define Uplode path 
        $uploadPath = 'public/images/BlogImages/';

        //move to Define folder and Check its pass to move
        if($imageInfos->move($uploadPath, $imageName)){
            //If pass return totel url to join uplodepath and imageName
            return $imageUrl = $uploadPath . $imageName;
        }else{
            //If Fails return empty $imageUrl
            return $imageUrl=' ';
        }
    }

     /**
     * This Function Destroy Inage Form Folder 
     *ImagePath is tha Colam name of Your Table 
     * Make Sure Your Coulam Name Are also ImagePath
     *You Can Chagge Thais If Your Tabel Coloun Name r Diffrenc
     */

    private function destroyPvesImage($dataImageById){
        //Destroy Image
        unlink($dataImageById->imagePath);
    }

}
