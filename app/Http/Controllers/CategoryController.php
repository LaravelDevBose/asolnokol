<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.category.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->chakeValidation($request);

        $category = new Category;
        $category->categoryName = $request->categoryName;
        $category->shortDescription = $request->shortDescription;
        $category->icon = $request->icon;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect()->back()->with('message', 'Category Information Save SuccessFully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $categories = Category::all();
        return view('backEnd.category.manageCategory', ['categories'=> $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $categoryById = Category::where('id', $id)->first();
        return view('backEnd.category.editCategory', ['categoryById'=>$categoryById]);
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
            $category= Category::find($request->categoryId);
            $category->categoryName = $request->categoryName;
            $category->shortDescription = $request->shortDescription;
            $category->icon = $request->icon;
            $category->publicationStatus = $request->publicationStatus;
            $category->save();
            // return to the manage file with value
            return redirect('/category.manage')->with('message', 'Category Information Update SuccessFully !');
        }else{
                return redirect('/category.edit')
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
        $categoryById = Category::find($id);
        $categoryById->delete();
        
        //return to manage file with message 
        return redirect('/category.manage')->with('message', 'Category Information Delete SuccessFully !');
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
        'categoryName' => 'required',
        'shortDescription' => 'required|max:1000',
        'icon' => 'required',
        'publicationStatus' => 'required',

        ]);

//IF validatio fails back to previes pages If pass than go function
        return $validation;
            
    }
}
