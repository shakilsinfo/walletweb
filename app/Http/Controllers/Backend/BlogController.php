<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use Alert;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogList = Blog::with('getBlogCategory')->get();
        
        return view('backend.blogs.index',compact('blogList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategory = BlogCategory::where('status',1)->get();
        return view('backend.blogs.create',compact('blogCategory'));
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
            'b_cat_id' => 'required',
            'title' => 'required',
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
        if ($request->hasFile('cover_image')) {

            $cover_image = $request->file('cover_image');
            $fileType = $cover_image->getClientOriginalExtension();
            $fileName = rand(1, 1000) . date('dmyhis') . "." . $fileType;
            $upload = $cover_image->move('public/blogs', $fileName);

            $input['cover_image'] = $fileName;
        }
        $input['slug'] = str_replace(' ', '-', strtolower($request->title));
        $input['meta_title'] = $request->title;

        try {
            $bug = 0;
            $insert = Blog::create($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Blog Successfully Added.');
            return redirect()->route('blog-list.index');
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
        $blogCategory = BlogCategory::where('status',1)->get();
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.edit',compact('blogCategory','blog'));
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
            'b_cat_id' => 'required',
            'title' => 'required',
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
        $updateBlog = Blog::findOrFail($id);
        if ($request->hasFile('cover_image')) {

            $cover_image = $request->file('cover_image');
            $fileType = $cover_image->getClientOriginalExtension();
            $fileName = rand(1, 1000) . date('dmyhis') . "." . $fileType;
            $upload = $cover_image->move('public/blogs', $fileName);

            $input['cover_image'] = $fileName;
            $img_path = 'public/blogs/' .  $updateBlog->cover_image;
            if ($updateBlog->cover_image != null and file_exists($img_path)) {
                unlink($img_path);
            }
        }else{
            $input['cover_image'] = $updateBlog->cover_image;
        }
        $input['slug'] = str_replace(' ', '-', strtolower($request->title));
        $input['meta_title'] = $request->title;

        try {
            $bug = 0;
            $updateBlog->update($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Blog Successfully updated.');
            return redirect()->route('blog-list.index');
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
        $findBlog = Blog::findOrFail($id);
        $img_path = 'public/blogs/' .  $findBlog->cover_image;
        if ($findBlog->cover_image != null and file_exists($img_path)) {
            unlink($img_path);
        }
        try {
            $bug = 0;
            $findBlog->delete();
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Blog Successfully deleted.');
            return redirect()->route('blog-list.index');
        } else {
            Alert::error('error', $bug);
            return redirect()->back();
        } 
    }
}
