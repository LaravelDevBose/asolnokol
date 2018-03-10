<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FackProductsImage;
use App\ContactUsMessage;
use App\MemberCategory;
use App\ProductsImage;
use App\ProductInfo;
use App\BlogContent;
use App\UserComment;
use App\BlogComment;
use App\BlogImage;
use App\ProductReview;
use App\Userlike;
use App\BlogLike;
use App\video;
use Session;
use DB;

class FrontEndController extends Controller{
      
    

   public function home(){
   	$value='1';

      $blogsInfo =BlogContent::where('publicationStatus', 1)->orderBy('id', 'desc')->paginate('6');

      $max=DB::table('blog_likes')->max('likes');

      $topBlogs = DB::table('blog_likes')
            ->join('blog_contents', 'blog_likes.blogId','=','blog_contents.id')
            ->select('blog_likes.likes','blog_contents.id','blog_contents.blogTitel')
            ->where('likes','<=', $max)
            ->orderBy('likes', 'desc')
            ->take(7)
            ->get();
      $latestVideos=video::where('publicationStatus', 1)->latest()->paginate(6);
   	return view('frontEnd.home.homeContent', ['value'=>$value,'blogsInfo'=>$blogsInfo, 'topBlogs'=>$topBlogs, 'latestVideos'=>$latestVideos]);
   }

   public function viewProductsByCaregory($id){
      $categoryeId=$id;
      $productsById = ProductInfo::where('categoryeId' , $categoryeId )->orderBy('id', 'desc')->paginate('12');
   	
      return view('frontEnd.viewProducts.viewProductsContent', ['categoryeId'=>$categoryeId,'productsById'=> $productsById]);

   }

   public function viewProductsByManufacturer($id){
      $menufacturerId=$id;
      $productsById = ProductInfo::where('manufacturerId' , $menufacturerId )->orderBy('id', 'desc')->paginate('12');
      return view('frontEnd.viewProducts.viewProductsContent', ['menufacturerId'=>$menufacturerId,'productsById'=> $productsById]);

   }
   public function viewProduct($cId, $mId ){
      $productsById = ProductInfo::where(['categoryeId' => $cId ], 'AND',['manufacturerId' , $mId]   )->orderBy('id', 'desc')->paginate('6');
      return view('frontEnd.viewProducts.viewProductsContent', ['categoryeId'=>$cId,'productsById'=> $productsById]);
   }

   public function singelProduct($id){
      $singelProduct=ProductInfo::where('id', $id)->first();
      $productImages=ProductsImage::where('productId', $id)->get();
      $fackproductImages=FackProductsImage::where('productId', $id)->get();
      // $comments = UserComment::where('productId', $id)->get();
      $reviews = ProductReview::where('productId', $id)->orderBy('id', 'desc')->get();
      $likes = Userlike::where('productId', $id)->first();

      return view('frontEnd.viewProducts.singelProductContent',['singelProduct'=>$singelProduct, 'productImages'=>$productImages, 'fackproductImages'=>$fackproductImages, 'reviews'=>$reviews, 'likes'=>$likes ,]);
   
   }

   public function viewBlog(){
      $blogsInfo = BlogContent::where('publicationStatus', 1)->latest()->paginate('8');
      $videoNewsInfos=Video::where('publicationStatus', 1)->latest()->paginate('8');
      $max=DB::table('blog_likes')->max('likes');

      $topBlogs = DB::table('blog_likes')
            ->join('blog_contents', 'blog_likes.blogId','=','blog_contents.id')
            ->select('blog_likes.likes','blog_contents.id','blog_contents.blogTitel')
            ->where('likes','<=', $max)
            ->orderBy('likes', 'desc')
            ->take(8)
            ->get();
      return view('frontEnd.blog.viewblogContent', ['topBlogs'=>$topBlogs,'blogsInfo'=>$blogsInfo,'videoNewsInfos'=>$videoNewsInfos]);

   }

   public function singelBlog($id){
      $singelBlog=BlogContent::where('id', $id)->first();
      $blogImages=BlogImage::where('blogId', $singelBlog->id)->get();
      $blogComments = BlogComment::where('blogId', $id)->get();
      $blogLikes = BlogLike::where('blogId', $id)->first();

      return view('frontEnd.blog.singelBlogContent',['singelBlog'=>$singelBlog,'blogImages'=>$blogImages, 'blogComments'=>$blogComments ,'blogLikes'=>$blogLikes,]);

   }


   public function searchByCategoryAndBand(Request $request){
      $searchProducts=ProductInfo::where( 'categoryeId', $request->categoryeId )
                                 ->orwhere('manufacturerId', $request->manufacturerId )
                                 ->paginate('9');
      return view('frontEnd.search.searchContent', ['searchProducts'=>$searchProducts ]);
   }

   public function searchByProductName(Request $request){
      $searchProducts=ProductInfo::where('productName','LIKE', '%'. $request->productName . '%')->paginate('9');
      
      return view('frontEnd.search.searchContent', ['searchProducts'=>$searchProducts ]);
      }

 

	public function contactUs(){
	
	return view('frontEnd.contactUs.contactUsContent');
	
	}

   public function teamProfile(){
      $memberCategories=MemberCategory::where('publicationStatus', 1)->get();
   return view('frontEnd.teamProfile.teamProfileContent',['memberCategories'=>$memberCategories]);
   
   }

   public function productReview()
   {
      $productsReview = ProductInfo::orderBy('id', 'desc')->paginate('12');
      return view('frontEnd.reviewProduct.reviewProductsContent',['productsReview'=>$productsReview]);
   }

   public function productreviewByCat($id)
   {
      $productsReview = ProductInfo::where('categoryeId' , $id )->orderBy('id', 'desc')->paginate('12');
      return view('frontEnd.reviewProduct.reviewProductsContent',['productsReview'=>$productsReview]);
   }

   public function productreviewByManu($id)
   {
      $productsReview = ProductInfo::where('manufacturerId' , $id )->orderBy('id', 'desc')->paginate('12');
      return view('frontEnd.reviewProduct.reviewProductsContent',['productsReview'=>$productsReview]);
   }












}
