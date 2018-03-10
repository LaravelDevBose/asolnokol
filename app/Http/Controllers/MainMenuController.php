<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\MainMenuInfo;

class MainMenuController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.mainMenu.createMenu');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->chakeValidation($request);

        $menu = new MainMenuInfo;
        $menu->menuName = $request->menuName;
        $menu->position = $request->position;
        $menu->childId = $request->childId;
        $menu->menuUrl = $request->menuUrl;
        $menu->publicationStatus = $request->publicationStatus;
        $menu->save();
        return redirect()->back()->with('message', 'Main Menu Information Save SuccessFully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $menusInfo = MainMenuInfo::all();
        return view('backEnd.mainMenu.manageMenu', ['menusInfo'=> $menusInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $menuById = MainMenuInfo::where('id', $id)->first();
        return view('backEnd.mainMenu.editMenu', ['menuById'=>$menuById]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        // chake the validation 

        $validation = $this->chakeValidation($request);
        if($validation->passes()){

            //update the Data 
            $menu= MainMenuInfo::find($request->menuId);
            $menu->menuName = $request->menuName;
            $menu->position = $request->position;
            $menu->childId = $request->childId;
            $menu->menuUrl = $request->menuUrl;
            $menu->publicationStatus = $request->publicationStatus;
            $menu->save();
            // return to the manage file with value
            return redirect('/menu.manage')->with('message', 'Main Menu Information Update SuccessFully !');
        }else{
                return redirect('/menu.edit')
                    ->withErrors($validation) 
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
       
        //find Data By $id And use Detele function deleteing  data
        $menuById = MainMenuInfo::find($id);
        $menuById->delete();
        
        //return to manage file with message 
        return redirect('/menu.manage')->with('message', 'Main Menu Information Delete SuccessFully !');
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
        'menuName' => 'required',
        'position' => 'required',
        'childId'=>'required',
        'menuUrl'=>'required',
        'publicationStatus' => 'required',

        ]);

//IF validatio fails back to previes pages If pass than go function
        return $validation;
            
    }
}
