<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\MemberCategory;

class MemberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.memberCategory.createMemberCategory');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->chakeValidation($request);

        $menu = new MemberCategory;
        $menu->categoryHeadding = $request->categoryHeadding;
        $menu->categoryTitle = $request->categoryTitle;
        $menu->position = $request->position;
        $menu->publicationStatus = $request->publicationStatus;
        $menu->save();
        return redirect()->back()->with('message', 'Team Member Category Information Save SuccessFully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $memberCategories = MemberCategory::all();
        return view('backEnd.memberCategory.manageMemberCategory', ['memberCategories'=> $memberCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $memberCategoryById = MemberCategory::where('id', $id)->first();
        return view('backEnd.memberCategory.editMemberCategory', ['memberCategoryById'=>$memberCategoryById]);
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
            $menu= MemberCategory::find($request->memberCategoryId);
            $menu->categoryHeadding = $request->categoryHeadding;
            $menu->categoryTitle = $request->categoryTitle;
            $menu->position = $request->position;
            $menu->publicationStatus = $request->publicationStatus;
            $menu->save();
            // return to the manage file with value
            return redirect('/member.category.manage')->with('message', 'Team Member Category  Information Update SuccessFully !');
        }else{
                return redirect('/member.category.edit')
                    ->withErrors($validatoion) 
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
        $menuById = MemberCategory::find($id);
        $menuById->delete();
        
        //return to manage file with message 
        return redirect('/member.category.manage')->with('message', 'Team Member Category Information Delete SuccessFully !');
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
        'categoryHeadding' => 'required',
        'categoryTitle' => 'required',
        'position' => 'required',
        'publicationStatus' => 'required',

        ]);

//IF validatio fails back to previes pages If pass than go function
        return $validation;
            
    }
}
