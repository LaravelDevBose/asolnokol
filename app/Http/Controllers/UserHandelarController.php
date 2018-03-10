<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ContactUsMessage;
use Session;

class UserHandelarController extends Controller
{
    /**
     * Display a listing of the Register User .
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAllUser(){
        //Retrive All Information Form User Table 
        $usersInfo = User::orderBy('id', 'desc')->paginate(10);
        //Return View With All Data
        return view('backEnd.user.viewAllUserInfo',['usersInfo'=>$usersInfo]);
    }

    /**
     * Show A singel User Ingormation.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewSingelUserInfo($id){
        //Retrive Data Form User Table Via Model Where userid equel $id
        $userInfos = User::where('id', $id)->first();
        //Return View With Data 
        return view('backEnd.user.viewSingelUserInfo',['userInfos'=>$userInfos]);
    }

    /**
     * Show All Messages.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showMessages(){
        //Show All Data Form Contact Us Message Table 
        $usersMessages = ContactUsMessage::orderBy('id', 'desc')->paginate(10);
        
        $viewTitle='View All Message';
        //return view with Data 
        return view('backEnd.user.viewUserMessage',['usersMessages'=>$usersMessages, 'viewTitle'=>$viewTitle]);
    }

    /**
     * Display All the UnRead Messages List.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unreadMessages(){
        //Find data where statas is 0 form contactUsMessage Table 
        $unReadMessages = ContactUsMessage::where('status', 0)->paginate(10);
        
        //store data unreadmessages to user messages for use same view
        $usersMessages=$unReadMessages;

        $viewTitle= 'View All Unread Message';
        //return view with data 
        return view('backEnd.user.viewUserMessage',['usersMessages'=>$usersMessages, 'viewTitle'=>$viewTitle ]);
    
    }

    /**
     * Show Un replyed messages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unreplyedMessages(){
         //Find data where statas is 0 form contactUsMessage Table 
        $unReplyedMessages = ContactUsMessage::where('status', 0)->orwhere('status', 1)->paginate(10);
        
        //store data unreadmessages to user messages for use same view
        $usersMessages=$unReplyedMessages;

        $viewTitle= 'View All Un-Replyed Message';
        //return view with data 
        return view('backEnd.user.viewUserMessage',['usersMessages'=>$usersMessages, 'viewTitle'=>$viewTitle ]);
    }

    /**
     * Show A singet Messages With Reply Option.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singelMessage($id){
        //find data where id equel $id form contactUsMessge table
        $singelMessage = ContactUsMessage::where('id', $id)->first();
        $status= $singelMessage->status;
        //chack is this view before
        if (!$status == '0' ) {

            //return view with date 
            return view('backEnd.user.viewUserSingelMessage',['singelMessage'=>$singelMessage ]);
        
        } else {
             //Update Data Info
            $message = ContactUsMessage::find($id);
            $message ->status = ($status+1) ;
            $message ->name = $singelMessage->name;
            $message ->email = $singelMessage->email;
            $message ->subject = $singelMessage->subject;
            $message ->message = $singelMessage->message;
            $message ->save();


            //Retrive Data agine 
            $singelMessage = ContactUsMessage::where('id', $id)->first();
            //return view with data
            return view('backEnd.user.viewUserSingelMessage',['singelMessage'=>$singelMessage ]);
        }

    }

    /**
     * Store all Reply Messages.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function replyMessage(Request $request){
        //store data in ContactUsMessage Table with user Information And paratns messageid

        //Sent mail to user via mail sarver 

        //retun back with Success full message
    }

    public function facebookCommentApp(){
        return view('backEnd.facebookComment.facebookComment');
    }

    
}
