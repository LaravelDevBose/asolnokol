<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
//<!-- FrontEndController -->
Route::get('/', 'FrontEndController@home')->name('index');
//ContactUsMessageController
Route::get('/contactUs', 'FrontEndController@contactUs');
Route::post('/contactUs.message.store', 'ContactUsMessageController@store');

Route::get('/team.profile', 'FrontEndController@teamProfile');

Route::get('/complian', 'ComplianMessage@index');
Route::post('/complian/store', 'ComplianMessage@store');

//FrontEndController
Route::get('/view.category.product/{id}', 'FrontEndController@viewProductsByCaregory');
Route::get('/view.manufacturer.product/{id}', 'FrontEndController@viewProductsByManufacturer');
Route::get('/view.product/{cId}/{mId}', 'FrontEndController@viewProduct');
Route::get('/singel.product/{id}', 'FrontEndController@singelProduct');

// Product Review Route List
Route::get('/product-review','FrontEndController@productReview');
Route::get('/product-review/category/{id}','FrontEndController@productreviewByCat');
Route::get('/product-review/manufacture/{id}','FrontEndController@productreviewByManu');

//ProductReviewController
Route::post('/review/store', 'ProductReviewController@reviewStore');

//StartRatingController
Route::get('/startRating/{proId}/{rate}', 'StartRatingController@ratingStore');
Route::get('/product.like/{id}', 'StartRatingController@likeStore');

//FrontEndController
Route::get('/blog', 'FrontEndController@viewBlog');
Route::get('/singel.blog/{id}', 'FrontEndController@singelBlog');
//BlogCommentAndLikeController
Route::post('/blog.comment', 'BlogCommentAndLikeController@blogCommentStore');
Route::get('/blog.like/{id}', 'BlogCommentAndLikeController@blogLikeStore');


//NewsletterSubscriberController
Route::post('/newsletter.subscriber.store', 'NewsletterSubscriberController@store');
//FrontEndController
Route::post('/search', 'FrontEndController@searchByCategoryAndBand');
Route::post('/search.productName', 'FrontEndController@searchByProductName');
Route::get('/search.result', 'FrontEndController@searchResultView');

//AuthController For User Login 
Auth::routes();
Route::get('/user.home', 'HomeController@index');
// Route::get('/user', 'FrontEndController@test');
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');




//<!-- BackEnd Controller -->


//AdminLogincontroller 
Route::get('/nokolasol' , 'AdminLogincontroller@loginFormContent')->name('admin');
Route::post('/admin.login' , 'AdminLogincontroller@adminlogin');
Route::post('/admin.logout' , 'AdminLogincontroller@logout');

Route::group(['middleware'=>['auth:admin']], function(){
	//AdminHomeController
	Route::get('/dashboard', 'AdminHomeController@index')->name('dashboard'); 
	Route::get('/admin.register' , 'AdminLogincontroller@registationFormContent')->name('register.admin');
	Route::post('/admin.register' , 'AdminLogincontroller@registerAdmin');
	
	
	//CategoryController

	Route::get('/category.insert', 'CategoryController@index');
	Route::post('/category.store', 'CategoryController@store');
	Route::get('/category.manage', 'CategoryController@show');
	Route::get('/category.edit/{id}', 'CategoryController@edit');
	Route::post('/category.update', 'CategoryController@update');
	Route::get('/category.delete/{id}', 'CategoryController@destroy');

	//MainMainMenuController

	Route::get('/menu.insert', 'MainMenuController@index');
	Route::post('/menu.store', 'MainMenuController@store');
	Route::get('/menu.manage', 'MainMenuController@show');
	Route::get('/menu.edit/{id}', 'MainMenuController@edit');
	Route::post('/menu.update', 'MainMenuController@update');
	Route::get('/menu.delete/{id}', 'MainMenuController@destroy');

	//ManufacturerController
	Route::get('/manufacturer.insert', 'ManufacturerController@index');
	Route::post('/manufacturer.store', 'ManufacturerController@store');
	Route::get('/manufacturer.manage', 'ManufacturerController@show');
	Route::get('/manufacturer.edit/{id}', 'ManufacturerController@edit');
	Route::post('/manufacturer.update', 'ManufacturerController@update');
	Route::get('/manufacturer.delete/{id}', 'ManufacturerController@destroy');

	//ProductInfoController
	Route::get('/product.insert', 'ProductInfoController@index');
	Route::post('/product.store', 'ProductInfoController@store');
	Route::get('/product.manage', 'ProductInfoController@show');
	Route::get('/product.view/{id}', 'ProductInfoController@fullView');
	Route::get('/product.edit/{id}', 'ProductInfoController@edit');
	Route::post('/product.update', 'ProductInfoController@update');
	Route::get('/product.delete/{id}', 'ProductInfoController@destroy');
	Route::get('/realproduct.singelImage.delete/{id}', 'ProductInfoController@deleteSingelRealProductImage');
	Route::get('/fackProduct.singelImage.delete/{id}', 'ProductInfoController@deleteSingelFackProductImage');

	// BlogContentController 
	Route::get('/blog.content.insert', 'BlogContentController@index');
	Route::post('/blog.store', 'BlogContentController@store');
	Route::get('/blog.content.manage', 'BlogContentController@show');
	Route::get('/blog.content.view/{id}', 'BlogContentController@fullView');
	Route::get('/blog.content.edit/{id}', 'BlogContentController@edit');
	Route::post('/blog.content.update', 'BlogContentController@update');
	Route::get('/blog.content.delete/{id}', 'BlogContentController@destroy');
	Route::get('/blog.content.singelImage.delete/{id}', 'BlogContentController@deleteSingelImage');

	//frontEndBannerController
	Route::get('/banner.insert', 'frontEndBannerController@index');
	Route::post('/banner.store', 'frontEndBannerController@store');
	Route::get('/banner.manage', 'frontEndBannerController@show');
	Route::get('/banner.edit/{id}', 'frontEndBannerController@edit');
	Route::post('/banner.update', 'frontEndBannerController@update');
	Route::get('/banner.delete/{id}', 'frontEndBannerController@destroy');

	//ContactUsInfoController
	Route::get('/contactUs.insert', 'ContactUsInfoController@index');
	Route::post('/contactUs.store', 'ContactUsInfoController@store');
	Route::get('/contactUs.manage', 'ContactUsInfoController@show');
	Route::get('/contactUs.edit/{id}', 'ContactUsInfoController@edit');
	Route::get('/contactUs.view/{id}', 'ContactUsInfoController@view');
	Route::post('/contactUs.update', 'ContactUsInfoController@update');
	Route::get('/contactUs.delete/{id}', 'ContactUsInfoController@destroy');

	//UserHandelarController
	Route::get('/view.all.user', 'UserHandelarController@viewAllUser');
	Route::get('/view.singel.user/{id}', 'UserHandelarController@viewSingelUserInfo');
	Route::get('/view.all.message', 'UserHandelarController@showMessages');
	Route::get('/view.message.singel/{id}', 'UserHandelarController@singelMessage');
	Route::get('/view.message.unread', 'UserHandelarController@unreadMessages');
	Route::get('/view.message.unreplyed', 'UserHandelarController@unreplyedMessages');
	Route::get('/message.reply/{id}', 'UserHandelarController@replyMessage');
	Route::get('/facebook.comment', 'UserHandelarController@facebookCommentApp');

	//VideoController
	Route::get('/video.insert', 'VideoController@index');
	Route::post('/video.store', 'VideoController@store');
	Route::get('/video.manage', 'VideoController@show');
	Route::get('/video.edit/{id}', 'VideoController@edit');
	Route::post('/video.update', 'VideoController@update');
	Route::get('/video.delete/{id}', 'VideoController@destroy');

	//TeamMemberController
	Route::get('/team.member.insert', 'TeamMemberController@index');
	Route::post('/team.member.store', 'TeamMemberController@store');
	Route::get('/team.member.manage', 'TeamMemberController@show');
	Route::get('/team.member.edit/{id}', 'TeamMemberController@edit');
	Route::post('/team.member.update', 'TeamMemberController@update');
	Route::get('/team.member.delete/{id}', 'TeamMemberController@destroy');

	//MemberCategoryController
	Route::get('/member.category.insert', 'MemberCategoryController@index')->name('member.category.insert');
	Route::post('/member.category.store', 'MemberCategoryController@store')->name('member.category.store');
	Route::get('/member.category.manage', 'MemberCategoryController@show')->name('member.category.manage');
	Route::get('/member.category.edit/{id}', 'MemberCategoryController@edit')->name('member.category.edit');
	Route::post('/member.category.update', 'MemberCategoryController@update')->name('member.category.update');
	Route::get('/member.category.delete/{id}', 'MemberCategoryController@destroy')->name('member.category.destroy');


	//ComplianMessage

	Route::get('/complain.view','ComplianMessage@view');
	Route::get('/complain.singel/{id}', 'ComplianMessage@singelView');
});


