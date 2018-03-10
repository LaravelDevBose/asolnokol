<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProductInfo;
use App\BlogContent;
use App\ProductReview;
use App\SocialProvider;
use DB;
use Charts;
use Analytics;

class AdminHomeController extends Controller
{
    public function index(){

        $users=User::all();
        $totalProduct=ProductInfo::all();
        $totalBlogs=BlogContent::all();
        $totalmsgs=ProductReview::all();
    	$newusers=User::orderBy('id', 'desc')->paginate('10');
    	$facebookUsers=SocialProvider::where('provider', 'facebook')->get();
    	$twitterUsers=SocialProvider::where('provider', 'twitter')->get();
    	$googleUsers=SocialProvider::where('provider', 'google')->get();
        $latestProducts = DB::table('product_infos')
                    ->join('categories', 'product_infos.categoryeId','=','categories.id')
                    ->join('manufacturers', 'product_infos.manufacturerId','=','manufacturers.id')
                    ->select('product_infos.id','product_infos.productName','categories.categoryName','manufacturers.manufacturerName')
                    ->paginate(10);
        $letestBlogs=DB::table('blog_contents')
                    ->join('blog_images', 'blog_contents.id','=','blog_images.blogId')
                    ->select('blog_contents.id','blog_contents.blogTitel','blog_contents.authorName','blog_contents.shortDescription','blog_images.imagePath')
                    ->paginate(10);
        $weeklyChart= $this->weeklyReport();
        $topBrowser = $this->topBrowsers();
        $monthlyReport = $this->monthlyVisitorsReport();
        $bounceReport = $this->userBounceReport();


    	return view('backEnd.home.homeContent' ,['users'=>$users, 'totalProduct'=>$totalProduct, 'totalBlogs'=>$totalBlogs,
            'totalmsgs'=>$totalmsgs, 'facebookUsers'=>$facebookUsers, 'twitterUsers'=>$twitterUsers, 'googleUsers'=>$googleUsers ,
            'latestProducts'=>$latestProducts , 'newusers'=>$newusers, 'letestBlogs'=>$letestBlogs, 'weeklyChart'=>$weeklyChart,
            'topBrowser'=>$topBrowser, 'monthlyReport'=>$monthlyReport , 'bounceReport'=>$bounceReport ]);
    }

    private function weeklyReport()
    {   
        $thisWeekVisitor = Analytics::thisWeekVisitor();
        $lastWeekVisitor = Analytics::lastWeekVisitor();
        $thisWeek = array_pluck($thisWeekVisitor, 'visitors');
        $lastWeek = array_pluck($lastWeekVisitor, 'visitors');


        $chartReport = Charts::multi('line', 'morris')
            ->title(" ")
            ->dimensions(0, 400) // Width x Height
            ->template("material")
            ->responsive(false)
            ->colors(['#2196F3', '#F44336'])
            ->dataset('This Week', $thisWeek)
            ->dataset('Last Week', $lastWeek)
            ->labels(['Sat', 'Sun', 'Mon', 'Tus', 'Wen', 'Tus', 'Fri']);

        return $chartReport;

    }

    private function topBrowsers(){

        $topBrowser = Analytics::fetchTopBrowsers();
        $browserLabels = array_pluck($topBrowser, 'browser');
        $totalData = array_pluck($topBrowser, 'sessions');

        $topBrowserReport = Charts::create('pie', 'c3')
            ->title(" ")
            ->dimensions(0, 400) // Width x Height
            ->template("material")
            ->responsive(false)
            // ->colors(['#2196F3', '#F44336'])
            ->values($totalData)
            ->labels($browserLabels);

        return $topBrowserReport;
    }

    private function monthlyVisitorsReport(){

        $monthlyVisitor = Analytics::monthlyVisitor();
        $monthlyData = array_pluck($monthlyVisitor, 'visitors');

        $monthlyReport = Charts::create('bar', 'highcharts')
            ->title(" ")
            ->elementLabel("Total")
            // ->y_axis_title('Visitors')
            ->dimensions(0, 400) // Width x Height
            ->template("material")
            ->responsive(false)
            // ->colors(['#2196F3', '#F44336'])
            ->values($monthlyData)
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ]);

        return $monthlyReport;
    }

    private function userBounceReport(){

        $usersBounce = Analytics::fetchUserTypes();
        $typesUser = array_pluck($usersBounce, 'type');
        $valueUser = array_pluck($usersBounce, 'sessions');

        $userTypeReport = Charts::create('donut', 'highcharts')
            ->title(' ')
            ->template("material")
            ->labels($typesUser)
            ->values($valueUser)
            ->dimensions(0,400)
            ->responsive(false);
        return $userTypeReport;
    }
}
