<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Course;
use Alert;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $courseList = Course::with('getCourseCategory')->where('status',1)->get();
        
        return view('backend.course.index',compact('courseList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseCategory = CourseCategory::where('status',1)->get();
        return view('backend.course.create',compact('courseCategory'));
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
            'cat_id' => 'required',
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
            $upload = $cover_image->move('public/courses', $fileName);

            $input['cover_image'] = $fileName;
        }
        $input['slug'] = str_replace(' ', '-', strtolower($request->title));
        $input['meta_title'] = $request->title;

        try {
            $bug = 0;
            $insert = Course::create($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Course Successfully Added.');
            return redirect()->route('courses.index');
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
        $courseCategory = CourseCategory::where('status',1)->get();
        $course = Course::findOrFail($id);
        return view('backend.course.edit',compact('courseCategory','course'));
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
            'cat_id' => 'required',
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
        $updateCourse = Course::findOrFail($id);
        if ($request->hasFile('cover_image')) {

            $cover_image = $request->file('cover_image');
            $fileType = $cover_image->getClientOriginalExtension();
            $fileName = rand(1, 1000) . date('dmyhis') . "." . $fileType;
            $upload = $cover_image->move('public/courses', $fileName);

            $input['cover_image'] = $fileName;
            $img_path = 'public/courses/' .  $updateCourse->cover_image;
            if ($updateCourse->cover_image != null and file_exists($img_path)) {
                unlink($img_path);
            }
        }else{
            $input['cover_image'] = $updateCourse->cover_image;
        }
        $input['slug'] = str_replace(' ', '-', strtolower($request->title));
        $input['meta_title'] = $request->title;

        try {
            $bug = 0;
            $updateCourse->update($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Course Successfully updated.');
            return redirect()->route('courses.index');
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
        $findCourse = Course::findOrFail($id);
        $img_path = 'public/courses/' .  $findCourse->cover_image;
        if ($findCourse->cover_image != null and file_exists($img_path)) {
            unlink($img_path);
        }
        try {
            $bug = 0;
            $findCourse->delete();
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Course Successfully deleted.');
            return redirect()->route('courses.index');
        } else {
            Alert::error('error', $bug);
            return redirect()->back();
        } 
    }
}
