<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\frontEndBannerInfo;
use App\ContactUsInfo;
use App\ProductsImage;
use App\Manufacturer;
use App\MainMenuInfo;
use App\ProductInfo;
use App\Category;
use App\video;
use App\Admin;
use Auth;
use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        #BackEnd
        view::composer('*', function($view){
            $adminId= Session::get('adminId');
            $adminInfo = Admin::where('id', $adminId)->first();
            $view->with('adminInfo', $adminInfo);
        });

        #frontEnd
        view::composer('frontEnd.master', function($view){
            $bannerImage=frontEndBannerInfo::where('publicationStatus', 1)->latest()->first();
            $view->with('bannerImage', $bannerImage);
        });

        View::composer('*', function ($view) {
            $categories=Category::where('publicationStatus', 1)->get();
            $manufacturers=Manufacturer::where('publicationStatus', 1)->get();
            $view->with('Auth::user()')
                ->with('categories',$categories)
                ->with('manufacturers',$manufacturers);
        });

        view::composer('frontEnd.includes.menuContent', function($view){
            $menusInfo=MainMenuInfo::where('publicationStatus', 1)->orderBy('position', 'asc')->get();
            $view->with('menusInfo', $menusInfo);
        });

        View::composer('frontEnd.viewProducts.leatestProductContent', function ($view) {
            $letestProducts = ProductInfo::where('publicationStatus' , 1)->orderBy('id','desc')->take('8')->get();
            
            $view->with('letestProducts',$letestProducts);
        });

        View::composer(['frontEnd.includes.sidebar','frontEnd.reviewProduct.reviewProductsContent'], function ($view) {
            $latestproducts=ProductInfo::where('publicationStatus', 1)->orderBy('id', 'desc')->take(3)->get();
            $max=DB::table('blog_likes')->max('likes');
            $topBlogs = DB::table('blog_likes')
                ->join('blog_contents', 'blog_likes.blogId','=','blog_contents.id')
                ->select('blog_likes.likes','blog_contents.id','blog_contents.blogTitel','blog_contents.shortDescription')
                ->where('likes','<=', $max)
                ->orderBy('likes', 'desc')
                ->get();
            $latestVideo=video::where('publicationStatus', 1)->latest()->first();
       
            $view->with('latestproducts',$latestproducts)
                ->with('topBlogs',$topBlogs)
                ->with('latestVideo',$latestVideo)
                ->with('latestVideo',$latestVideo);
        });








        View::composer(['frontEnd.includes.footerContent', 'frontEnd.contactUs.contactUsContent'], function ($view) {
            $contactUsInfo=ContactUsInfo::where('publicationStatus', 1)->latest()->first();          
            $view->with('contactUsInfo',$contactUsInfo);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
