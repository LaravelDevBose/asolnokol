<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\ProductInfo;
use App\ProductsImage;
use App\FackProductsImage;
use Session;
use DB;
use App\Traits\ProductImage;

class ProductInfoController extends Controller 
{   
    use ProductImage;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories= Category::where('publicationStatus', 1)->get();
        $manufacturies= Manufacturer::where('publicationStatus', 1)->get();
        
        return view('backEnd.product.createProductInfo',['categories'=>$categories, 'manufacturies'=>$manufacturies]);
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
            if($request->categoryeId != 0 && $request->manufacturerId != 0){

                //move Information Supergobel $File to local $files variable
                $imagesInfos=$request->file('image');
                $fackProductImages=$request->file('fackProductImage');
                //couent total file 
                $totalcount= count($imagesInfos) + count($fackProductImages);
                //check total File
                if ($totalcount != 0) {
                    
                    $fackProductImagesUrl = array();
                    $realProductImagesUrl = array();
                    //If validation Pass Store data (Vie function produtStore($reuest) ) and get product Id
                    //Get product Id Form  function 
                    $productId = $this->produtStore($request);
                    //Move Images In Directory Folder(via function storeImagesInFolder($files) ) 
                    //And get $imagesUrl array
                    if(count($imagesInfos) > 0){

                        $realProductImagesUrl = $this->resizeAndStoreImagesInFolder($imagesInfos );
                        $this->storeRealProductImages($imagesInfos ,$realProductImagesUrl, $productId);
                    }
                    if(count($fackProductImages) > 0){

                        $fackProductImagesUrl = $this->resizeAndStoreImagesInFolder($fackProductImages);
                        $this->storeFackProductImages($fackProductImages ,$fackProductImagesUrl, $productId);
                    }

                    
                   

                        //return Previous pages with Success mesages
                    return redirect()->back()->with('success', 'Product Information Store SuccessFully !');
                    
                }else{
                    return redirect('/product.insert')
                    ->with('unsuccess', 'Product Image Are Requierd !')
                    ->withInput();
                }
            }else{
                return redirect()
                ->back()
                ->with('unsuccess', 'Select Category And Manufacture Name')
                ->withInput();
            }
        }else{
            return redirect()
                ->back()
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
        $productsInfos = DB::table('product_infos')
                    ->join('categories', 'product_infos.categoryeId','=','categories.id')
                    ->join('manufacturers', 'product_infos.manufacturerId','=','manufacturers.id')
                    ->select('product_infos.id','product_infos.productName','product_infos.shortDescription','product_infos.publicationStatus','categories.categoryName','manufacturers.manufacturerName')
                    ->paginate(10);


        return view('backEnd.product.manageProductInfo',['productsInfos' => $productsInfos]);
    }

    public function fullView($id){
        //join all Relative table
        $productInfos = DB::table('product_infos')
                    ->join('categories', 'product_infos.categoryeId','=','categories.id')
                    ->join('manufacturers', 'product_infos.manufacturerId','=','manufacturers.id')
                    ->select('product_infos.*','categories.categoryName','manufacturers.manufacturerName')
                    ->where('product_infos.id', $id)
                    ->first();

        //get Product Images where  product id equel $id
        $realProductImages = ProductsImage::where('productId', $id)->get();
        $fackProductImages = FackProductsImage::where('productId', $id)->get();

        return view('backEnd.product.viewProductInfo',['productInfos' => $productInfos , 'realProductImages'=> 
            $realProductImages, 'fackProductImages'=>$fackProductImages]);
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
        $productInfoById = ProductInfo::where('id', $id)->first();
        $realProductImages = ProductsImage::where('productId', $id)->get();
        $fackProductsImages = FackProductsImage::where('productId', $id)->get();

        return view('backEnd.product.editProductInfo',['categories'=>$categories, 'manufacturies'=>$manufacturies,'productInfoById'=>$productInfoById, 'realProductImages'=>$realProductImages, 'fackProductsImages'=>$fackProductsImages]);
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
            $fackProductImages=$request->file('fackProductImage');
            //couent total file 
            $totalcount= count($imagesInfos) + count($fackProductImages);

            if($totalcount != 0 ){

                

                    //If validation Pass Update data (Vie function produtStore($reuest) ) and get product Id
                    //Get product Id Form  function 
                    $productId = $this->productUpdate($request);

                    //Move Images In Directory Folder(via function storeImagesInFolder($files) ) 
                    //And get $imagesUrl array
                    if(count($imagesInfos) > 0){
                    	$realProductImagesUrl = $this->resizeAndStoreImagesInFolder($imagesInfos );
                    	$this->storeRealProductImages($imagesInfos ,$realProductImagesUrl, $productId);
                    }
                    
                    if( count($fackProductImages) > 0){
                    	$fackProductImagesUrl = $this->resizeAndStoreImagesInFolder($fackProductImages);
                    	$this->storeFackProductImages($fackProductImages ,$fackProductImagesUrl, $productId);
                    }

                        //return Previous pages with Success mesages
                    return redirect('/product.manage')->with('success', 'Product Information Store SuccessFully !');
                
            }else{
                //Update Product Information
                $this->productUpdate($request);

                //return Previous pages with Success mesages
                return redirect('/product.manage')->with('success', 'Product Information Store SuccessFully !');
            }
        }else{
            return redirect()
                ->back()
                ->withErrors($validator);
                
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
        $res1 = $this->destroyRealProductImages($id);
        $res2 = $this->destroyFackProductImages($id);
        $result = $res1+$res2;
        // If delete  Enter If Condition
        if(!$result){

            //Again Find and Get manufacturer by Id And Delete All info 
            $productById = ProductInfo::find($id);
            $productById->delete();
        }
        //If Can not Delete Enter Else Condition 
        else{
            //return back With message
             return redirect()->back()->with('unsuccess', 'Oops Something Wrong !');
        }

        //Return Manage page With Success message
        return redirect('/product.manage')->with('success', 'Company Information Delete SuccessFully !');
    
    }

    private function produtStore($request){

        //Store Data via Model file 
        $product = new ProductInfo;
        $product->productName = $request->productName;
        $product->categoryeId = $request->categoryeId;
        $product->manufacturerId = $request->manufacturerId;
        $product->identify = $request->identify;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->fackProductLongDescription = $request->fackProductLongDescription;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();

        //get Product id 
        $productId = $product->id;
        //return Product Id
        return $productId;
        
    }

    private function productUpdate($request){
        //Store Data via Model file 
        $product = ProductInfo::find($request->productInfoId);
        $product->productName = $request->productName;
        $product->categoryeId = $request->categoryeId;
        $product->manufacturerId = $request->manufacturerId;
        $product->identify = $request->identify;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription = $request->longDescription;
        $product->fackProductLongDescription = $request->fackProductLongDescription;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();

        //get Product id 
        $productId = $product->id;
        //return Product Id
        return $productId;
    
    }

    private function storeRealProductImages($imagesInfos ,$imagesUrl, $productId){
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

    private function storeFackProductImages($imagesInfos ,$imagesUrl, $productId){
        //Declear $i
        $i= 0;

        //Start foreach Loop 
        foreach ($imagesInfos as $imageInfos) {
            //get Original Name Form $file as $imageName
            //get Image Url form $imageUrl[$i] as $imageUrl
            //store data Via ProductImage Model
            $productsImage = new FackProductsImage ;
            $productsImage->productId = $productId;
            $productsImage->fackProductImageName = $imageInfos->getClientOriginalName();
            $productsImage->fackProductImagePath = $imagesUrl[$i];
            $productsImage->save();

            //Incress $i
            $i++;
        }    
    }

    public function deleteSingelRealProductImage($id){

        $imageById = ProductsImage::find($id);
        $this->destroyPvesImage($imageById);

        $imageById = ProductsImage::find($id);
        $imageById->delete();

        return redirect()->back()->with('success', 'Image Delete SuccessFully !');
    }

    public function deleteSingelFackProductImage($id){

        $imageById = FackProductsImage::find($id);
        $this->destroyFackProductImage($imageById);

        $imageById = FackProductsImage::find($id);
        $imageById->delete();

        return redirect()->back()->with('success', 'Image Delete SuccessFully !');
    }

    private function destroyRealProductImages($productId){
        //find product Info By $id
        $productImagesById = ProductsImage::where('productId', $productId)->get();

        //Create Forecah Loop 
        foreach ($productImagesById as $productImageById) {
            $this->destroyPvesImage($productImageById);
            $productImage = ProductsImage::find( $productImageById->id );
            $productImage->delete();
        }  
    }

    private function destroyFackProductImages($productId){
        //find product Info By $id
        $productImagesById = FackProductsImage::where('productId', $productId)->get();

        //Create Forecah Loop 
        foreach ($productImagesById as $productImageById) {
            $this->destroyFackProductImage($productImageById);
            $productImage = FackProductsImage::find( $productImageById->id );
            $productImage->delete();
        }  
    }

  /**
     * Construct the valudation.
     *
     * @return \Illuminate\Http\Response
     */
    public function chakeValidation($request){
        //Create validation
        $validation=Validator::make($request->all(),[
        'productName' => 'required',
        'categoryeId' => 'required',
        'manufacturerId' => 'required',
        'identify' => 'required',
        'shortDescription' => 'required|max:255',
        'longDescription' => 'required',
        'fackProductLongDescription' => 'required',
        'publicationStatus' => 'required',

        ]);

        //return $validation Result
        return $validation ;        
    }

    private function destroyPvesImage($imageinfoById){
        if(file_exists($imageinfoById->imagePath)){
            //Destroy Image
            unlink($imageinfoById->imagePath);
        }
        
    }

    private function destroyFackProductImage($imageinfoById){
        if(file_exists($imageinfoById->fackProductImagePath)){
            //Destroy Image
            unlink($imageinfoById->fackProductImagePath);
        }
        
    }
}
