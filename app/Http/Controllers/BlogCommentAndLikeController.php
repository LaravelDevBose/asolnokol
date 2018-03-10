<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\BlogComment;
use App\BlogLike;
use DB;

class BlogCommentAndLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogCommentStore(Request $request)
    {
        
        $validator = $this->chakeValidation($request);
        if($validator->passes()){

            $this->storeData($request);
            return redirect('/singel.blog/'.$request->blogId);         
        }else{
         return redirect()
                ->back()
                ->withErrors($validator) 
                ->withInput();
        }
    }

    /**
     * Store data Via this function.
     *just Change Model Name And Input field Name If u Reuse It
     * @return \Illuminate\Http\Response
     */
    private function storeData($request){
        //Ckeck login User Or Not
        //IF login Take Information Form User Table And Store In Comment Tavle
        if (!empty($request->userId)) {
            //Retrive user Information Form user Table
            $userInfo = User::where('id', $request->userId )->first();

            //Store Data In Comment Table
            $data= new BlogComment;
            $data->blogId= $request->blogId;
            $data->name=$userInfo->name;
            $data->email=$userInfo->email;
            $data->comment=$request->comment;
            $data->save();

        } else {
           
        //Else Not Than Take Data Form Request And Store In Comment Table
            $data= new BlogComment;
            $data->blogId= $request->blogId;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->comment=$request->comment;
            $data->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blogLikeStore($id){
        $totalLikes = BlogLike::where('blogId', $id)->first();

        
        if (!empty($totalLikes)) {

            DB::table('blog_likes')->where('blogId',$id)->increment('likes');
        } else {
            $like = new BlogLike;
            $like->blogId=$id;
            $like->likes= '1';
            $like->save();
        }
        
        return redirect('/singel.blog/'.$id);
    }

    /**
     * Construct the valudation.
     *
     * @return \Illuminate\Http\Response
     */
    public function chakeValidation($request){
      //check validation Type
      if (!empty($request->userId)) {
         //Create validation
        $validation=Validator::make($request->all(),[
        'comment' => 'required|min:10|max:2000',
        ]);

      } else {
         
         //Create validation
        $validation=Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|email',
        'comment' => 'required|min:10|max:2000',
        ]);

      }
        //return $validation Result
        return $validation ;        
    }
}
