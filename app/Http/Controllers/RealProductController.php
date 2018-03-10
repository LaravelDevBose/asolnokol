<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\RealProduct;
use App\ProductsImage;
use Session;
use DB;


class RealProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories= Category::where('publicationStatus', 1)->get();
        $manufacturies= Manufacturer::where('publicationStatus', 1)->get();
        
        return view('backEnd.realProduct.createRealProduct',['categories'=>$categories, 'manufacturies'=>$manufacturies]);
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
                    $productId = $this->produtStore($request);

                    //Move Images In Directory Folder(via function storeImagesInFolder($files) ) 
                    //And get $imagesUrl array
                    $imagesUrl = $this->storeImagesInFolder($imagesInfos);

                    $this->storeProductImages($imagesInfos ,$imagesUrl, $productId);

                        //return Previous pages with Success mesages
                    return redirect()->back()->with('success', 'Product Information Store SuccessFully !');
                }
                else{
                    //If Validation Fails Back to Previous pages with Erros Messages
                    return redirect()->back()->with('unsuccess', 'Pleass Uplode Valid Image !');
                }
            }else{
                return redirect('/realProduct.insert')
                ->withErrors('unsuccess', 'Image Are Requierd !')
                ->withInput();
            }
        }else{
            return redirect('/realProduct.insert')
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
        //join table   ------
        $productsInfos = DB::table('real_products')
                    ->join('categories', 'real_products.categoryeId','=','categories.id')
                    ->join('manufacturers', 'real_products.manufacturerId','=','manufacturers.id')
                    ->select('real_products.id','real_products.productName', 'real_products.menuItemPrice',
                        'real_products.shortDescription','real_products.publicationStatus','categories.categoryName',
                        'manufacturers.manufacturerName')
                    ->paginate(10);


        return view('backEnd.realProduct.manageRealProduct',['productsInfos' => $productsInfos]);
    }

    public function fullView($id){
        //join all Relative table
        $productInfos = DB::table('real_products')
                    ->join('categories', 'real_products.categoryeId','=','categories.id')
                    ->join('manufacturers', 'real_products.manufacturerId','=','manufacturers.id')
                    ->select('real_products.*','categories.categoryName','manufacturers.manufacturerName')
                    ->where('real_products.id', $id)
                    ->first();

        //get Product Images where  product id equel $id
        $productImages = ProductsImage::where('productId', $id)->get();

        return view('backEnd.realProduct.viewRealProduct',['productInfos' => $productInfos , 'productImages'=> 
            $productImages]);
        //return view with data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        //Retrive data where $id
        $categories= Category::where('publicationStatus', 1)->get();
        $manufacturies= Manufacturer::where('publicationStatus', 1)->get();
        $productInfoById = RealProduct::where('id', $id)->first();
        $productImages = ProductsImage::where('productId', $id)->get();

        return view('backEnd.realProduct.editRealProduct',['categories'=>$categories, 'manufacturies'=>$manufacturies,'productInfoById'=>$productInfoById, 'productImages'=>$productImages]);
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
                    $productId = $this->productUpdate($request);

                    //Move Images In Directory Folder(via function storeImagesInFolder($files) ) 
                    //And get $imagesUrl array
                    $imagesUrl = $this->storeImagesInFolder($imagesInfos);

                    $this->storeProductImages($imagesInfos ,$imagesUrl, $productId);

                        //return Previous pages with Success mesages
                    return redirect('/realProduct.manage')->with('success', 'Product Information Store SuccessFully !');
                }
                else{
                    //If Validation Fails Back to Previous pages with Erros Messages
                    return redirect()->back()->with('unsuccess', 'Pleass Uplode Valid Image !');
                }
            }else{
                //Update Product Information
                $this->productUpdate($request);

                //return Previous pages with Success mesages
                return redirect('/realProduct.manage')->with('success', 'Product Information Store SuccessFully !');
            }
        }else{
            return redirect('/realProduct.insert')
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
            $manufacturerById = RealProduct::find($id);
            $manufacturerById->delete();
        }
        //If Can not Delete Enter Else Condition 
        else{
            //return back With message
             return redirect()->back()->with('unsuccess', 'Oops Something Wrong !');
        }

        //Return Manage page With Success message
        return redirect('/realProduct.manage')->with('success', 'Company Information Delete SuccessFully !');
    
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
        'productName' => 'required',
        'categoryeId' => 'required',
        'manufacturerId' => 'required',
        'menuItemPrice' => 'required',
        'identify' => 'required',
        'shortDescription' => 'required|max:255',
        'longDescription' => 'required',
        'publicationStatus' => 'required',

        ]);

        //return $validation Result
        return $validation ;        
    }

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

    private function produtStore($request){

        //Store Data via Model file 
        $product = new RealProduct;
        $product->productName = $request->productName;
        $product->categoryeId = $request->categoryeId;
        $product->manufacturerId = $request->manufacturerId;
        $product->menuItemPrice = $request->menuItemPrice;
        $product->identify = $request->identify;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();

        //get Product id 
        $productId = $product->id;
        //return Product Id
        return $productId;
        
    }

    private function productUpdate($request){
        //Store Data via Model file 
        $product = RealProduct::find($request->productInfoId);
        $product->productName = $request->productName;
        $product->categoryeId = $request->categoryeId;
        $product->manufacturerId = $request->manufacturerId;
        $product->menuItemPrice = $request->menuItemPrice;
        $product->identify = $request->identify;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();

        //get Product id 
        $productId = $product->id;
        //return Product Id
        return $productId;
    }

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

    private function storeProductImages($imagesInfos ,$imagesUrl, $productId){
        //Declear $i
        $i= 0;

        //Start foreach Loop 
        foreach ($imagesInfos as $imageInfos) {
            //get Original Name Form $file as $imageName
            //get Image Url form $imageUrl[$i] as $imageUrl
            //store data Via ProductImage Model
            $productsImage = new ProductsImage ;
            $productsImage->productId = $productId;
            $productsImage->imageName = $imageInfos->getClientOriginalName();
            $productsImage->imagePath = $imagesUrl[$i];
            $productsImage->save();

            //Incress $i
            $i++;
        }    
    }

    private function destroyImages($productId){
        //find product Info By $id
        $productImagesById = ProductsImage::where('productId', $productId)->get();

        //Create Forecah Loop 
        foreach ($productImagesById as $productImageById) {
            $this->destroyPvesImage($productImageById);
            $productImage = ProductsImage::find( $productImageById->id );
            $productImage->delete();
        }  
    }

    public function deleteSingelImage($id){

        $productImageById = ProductsImage::find($id);
        $this->destroyPvesImage($productImageById);

        $productImage = ProductsImage::find($id);
        $productImage->delete();

        return redirect()->back()->with('success', 'Image Delete SuccessFully !');
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
        if($imageSize > 50000){
            //If imageSize is getter then 50000 bit then back to Previous page with status message 
            return redirect()->back()->with('status', 'Image  are too large File');
        }
        
    }

    private function moveUplodeImage($imageInfos){
        //Get Image name
        $imageName =$imageInfos->getClientOriginalName();

        //Define Uplode path 
        $uploadPath = 'public/images/ProductImages/';

        //move to Define folder and Check its pass to move
        if($imageInfos->move($uploadPath, $imageName)){
            //If pass return totel url to join uplodepath and imageName
            return $imageUrl = $uploadPath . $imageName;
        }else{
            //If Fails return empty $imageUrl
            return $imageUrl=' ';
        }
    }

    private function destroyPvesImage($imageinfoById){
        //Destroy Image
        unlink($imageinfoById->imagePath);
    }
}
