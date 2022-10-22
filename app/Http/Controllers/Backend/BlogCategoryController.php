<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BlogCategory;
use Alert;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = BlogCategory::where('status',1)->get();

        return view('backend.blogCategory.category',compact('categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $plainErrorText = "";
            $errorMessage = json_decode($validator->messages(), True);
            foreach ($errorMessage as $value) {
                $plainErrorText .= $value[0] . ". ";
            }
            Alert::error('error', $plainErrorText);
            return  redirect()->back();
        }
        $input = $request->all();
        
        $input['slug'] = str_replace(' ', '-', strtolower($request->name));

        try {
            $bug = 0;
            $insert = BlogCategory::create($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Category Successfully Added.');
            return redirect()->route('blog-category.index');
        } else {
            Alert::error('error', $bug);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $plainErrorText = "";
            $errorMessage = json_decode($validator->messages(), True);
            foreach ($errorMessage as $value) {
                $plainErrorText .= $value[0] . ". ";
            }
            Alert::error('error', $plainErrorText);
            return  redirect()->back();
        }
        $input = $request->all();
        $updateCategory = BlogCategory::findOrFail($id);
        
        $input['slug'] = str_replace(' ', '-', strtolower($request->name));
        

        try {
            $bug = 0;
            $updateCategory->update($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Category Successfully updated.');
            return redirect()->route('blog-category.index');
        } else {
            Alert::error('error', $bug);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findCategory = BlogCategory::findOrFail($id);
        
        try {
            $bug = 0;
            $findCategory->delete();
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Category Successfully deleted.');
            return redirect()->route('blog-category.index');
        } else {
            Alert::error('error', $bug);
            return redirect()->back();
        } 
    }
}
