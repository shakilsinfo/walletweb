<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseLesson;

use Alert;
class CourseLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $lessonList = CourseLesson::with('course')->where('status',1)->get();

        return view('backend.lesson.index',compact('lessonList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseList = Course::where('status',1)->get();
        return view('backend.lesson.create',compact('courseList'));
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
            'course_id' => 'required',
            'lesson_name' => 'required',
            'video_lesson' => 'required',
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
        if ($request->hasFile('video_lesson')) {

            $video_lesson = $request->file('video_lesson');
            $fileType = $video_lesson->getClientOriginalExtension();
            $fileName = rand(1, 1000) . date('dmyhis') . "." . $fileType;
            $upload = $video_lesson->move('public/lesson', $fileName);

            $input['video_lesson'] = $fileName;
        }

        try {
            $bug = 0;
            $insert = CourseLesson::create($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Lesson Successfully Added.');
            return redirect()->route('course-lesson.index');
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
        $courseList = Course::where('status',1)->get();
        $lesson = CourseLesson::findOrFail($id);
        return view('backend.lesson.edit',compact('lesson','courseList'));
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
            'course_id' => 'required',
            'lesson_name' => 'required',
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
        $updateLesson = CourseLesson::findOrFail($id);
        if ($request->hasFile('video_lesson')) {

            $video_lesson = $request->file('video_lesson');
            $fileType = $video_lesson->getClientOriginalExtension();
            $fileName = rand(1, 1000) . date('dmyhis') . "." . $fileType;
            $upload = $video_lesson->move('public/lesson', $fileName);

            $input['video_lesson'] = $fileName;
            $img_path = 'public/lesson/' .  $updateLesson->video_lesson;
            if ($updateLesson->video_lesson != null and file_exists($img_path)) {
                unlink($img_path);
            }
            
        }else{
            $input['video_lesson'] = $updateLesson->video_lesson;
        }
        
        try {
            $bug = 0;
            $updateLesson->update($input);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Lesson Successfully updated.');
            return redirect()->route('course-lesson.index');
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
        $findLesson = CourseLesson::findOrFail($id);
        $img_path = 'public/lesson/' .  $findLesson->video_lesson;
        if ($findLesson->video_lesson != null and file_exists($img_path)) {
            unlink($img_path);
        }
        try {
            $bug = 0;
            $findLesson->delete();
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'Lesson Successfully deleted.');
            return redirect()->route('course-lesson.index');
        } else {
            Alert::error('error', $bug);
            return redirect()->back();
        } 
    }
}
