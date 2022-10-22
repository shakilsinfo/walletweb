<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Alert;
use Hash;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $data['getCategories'] = CourseCategory::orderBy('id','desc')->take(6)->get();
        $data['getCourses'] = Course::orderBy('id','desc')->take(6)->get();
        return view('frontend.index',$data);
    }

    public function courseList(){
        $data['courseList'] = Course::where('status',1)->get();

        return view('frontend.courseList',$data);
    }
    public function singleCourseLesson($slug){
        $data['getSingleCourse'] = Course::where('slug', $slug)->first();
        if(!empty($data['getSingleCourse'])){
          return view('frontend.single-course',$data);  
        }
        else{
            abort(404);
        }
    }

    public function saveRegisteredUser(Request $request){

        $validator = Validator::make($request->all(), [
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
        try {
            $bug = 0;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => session()->get('auth_phone'),
                'user_type' => $request->user_type,
                'password' => Hash::make($request->password),
            ]);
        } catch (Exception $e) {
          $bug = $e->getMessage();  
        } 
        if($bug===0){
            Alert::success('success','Successfully registered and Loggedin.');
            Auth::login($user);
            return redirect('/');
        }else{
            Alert::success('error',$bug);
            return redirect()->back();
        }
    }
    public function checkAuthenticUser(Request $request){

        $request->validate([
            'phone_number' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('phone_number', 'password');
        if (Auth::attempt($credentials)) {
            toastr()->success('Successfully Loggedin');
            return redirect()->back();
        }else{
            Alert::error('warning','You have entered invalid credentials');
          return redirect("user/login")->with('error','You have entered invalid credentials')->withInput();;  
        }
        
    }
    public function contactUs(){
        return view('frontend.contactus');
    }
    public function aboutUs(){
        return view('frontend.aboutus');
    }
    public function categoryWiseBlog($blogCategorySlug){
        $findCategory = BlogCategory::where('slug',$blogCategorySlug)->first();
        if(!empty($findCategory)){
            $findBlog = Blog::where('b_cat_id',$findCategory->id)->get();
            $recentBlog = Blog::orderBy('id','desc')->limit(5)->get();
            $bcategory = BlogCategory::get();
            return view('frontend.blogs', compact('bcategory','recentBlog','findBlog','findCategory'));
        }else{
            abort(404);
        }
        
    }
    public function singleBlog($blogSlug){

       $findBlog = Blog::where('slug',$blogSlug)->first();
        if(!empty($findBlog)){
            $recentBlog = Blog::orderBy('id','desc')->limit(5)->get();
            $bcategory = BlogCategory::get();
            $url = "https://manojroy.com/salesTalk/air-ticketing-and-reservation-professional-course";

            $shareComponent = \Share::page(
                $url)->facebook('Facebook Share')->linkedin();

            return view('frontend.blog-single', compact('findBlog','recentBlog','bcategory','shareComponent'));
        }else{
            abort(404);
        } 
    }
    public function categoryWiseCourse($catSlug){
        $findCategory = CourseCategory::where('slug',$catSlug)->first();

       
        if(!empty($findCategory)){
            $courseList = Course::where('cat_id',$findCategory->id)->get();
            return view('frontend.category-course', compact('findCategory','courseList'));
        }else{
            abort(404);
        } 
    }
    public function userRegister(){
        if(!Auth::check()){
            
            return view('frontend.pre-register');
        }else{
            toastr()->error('Already Loggedin');
            return redirect('/');
        }
        
    }

    public function userRegisterComplete(){
        if(session()->has('auth_phone')){
            
            return view('frontend.register');
        }else{
            toastr()->error('Already Loggedin');
            return redirect('/');
        }
        
    }
    
    public function userLogin(){
        if(!Auth::check()){
            return view('frontend.login');
        }else{
            toastr()->error('Already Loggedin');
            return redirect('/');
        }
        
    }
    public function userPasswordForgot(){

        
        return view('frontend.forgotpassword');
    }

    public function getOtpData(Request $request){
         $rules = [
            'phone_number' => 'required|max:11|min:11'
        ];
        
        $this->validate($request, $rules);
        $checkPhoneExist = User::where('phone_number',$request->phone_number)->first();

        if(!empty($checkPhoneExist)){
            
            return redirect()->back()->with('error','Phone number is already registered');
        }
        $msisdn = $request->phone_number;
        $pin = $this->generatePin();
        $msg = $pin. ' is your one time OTP for registration. Please do not share this OTP/Password with anyone. Thanks from manojroy.com';
        $msgUrl = urlencode($msg);
        $curl = curl_init();

        // https://powersms.banglaphone.net.bd/httpapi/sendsms?userId=manoj&password=Manoj123&smsText=Testonly&commaSeperatedReceiverNumbers=01646309320
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://powersms.banglaphone.net.bd/httpapi/sendsms?userId=manoj&password=Manoj123&smsText=$msgUrl&commaSeperatedReceiverNumbers=$msisdn",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Cookie: ASP.NET_SessionId=nw2yvj45n4dvrm2mnppqlrih'
            ),
        ));

        $response = curl_exec($curl);
        $makeResponse = [
            'status' => 200,
            'message' => 'OTP send to your phone.'
        ];
        $jsonRes = json_decode(json_encode($response),true);

        $request->session()->put('auth_phone', $request->phone_number);
        $request->session()->put('otp', $pin);
        return redirect("user/verifyotp")->with('success', $makeResponse['message']);
        
    }

    public function verifyPhoneToSendOtp(Request $request){
         $rules = [
            'phone_number' => 'required|max:11|min:11'
        ];
        
        $this->validate($request, $rules);
        $checkPhoneExist = User::where('phone_number',$request->phone_number)->first();

        if(empty($checkPhoneExist)){
            
            return redirect()->back()->with('error','Phone number is invalid or not registered.');
        }
        $msisdn = $request->phone_number;
        $pin = $this->generatePin();
        $msg = $pin. ' is your one time OTP for password reset. Please do not share this OTP/Password with anyone. Thanks from manojroy.com';
        $msgUrl = urlencode($msg);
        $curl = curl_init();

        // https://powersms.banglaphone.net.bd/httpapi/sendsms?userId=manoj&password=Manoj123&smsText=Testonly&commaSeperatedReceiverNumbers=01646309320
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://powersms.banglaphone.net.bd/httpapi/sendsms?userId=manoj&password=Manoj123&smsText=$msgUrl&commaSeperatedReceiverNumbers=$msisdn",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Cookie: ASP.NET_SessionId=nw2yvj45n4dvrm2mnppqlrih'
            ),
        ));

        $response = curl_exec($curl);
        $makeResponse = [
            'status' => 200,
            'message' => 'OTP send to your phone.'
        ];
        $jsonRes = json_decode(json_encode($response),true);

        $request->session()->put('auth_phone', $request->phone_number);
        $request->session()->put('otp', $pin);
        return redirect("user/verify-otp")->with('success', $makeResponse['message']);
        
    }
    
    function generatePin($digits = 4){
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            $i++;
        }
        return $pin;
    }

    public function verifyPhoneToSendOtpVerify(Request $request)
    {

        if (session()->has('auth_phone')) {
            return view('frontend.verify-phone');
        } else {
            return redirect()->back();
        }
    }
    public function verifyPhoneToSendOtpVerify2(Request $request)
    {

        if (session()->has('auth_phone')) {
            return view('frontend.verify-phone2');
        } else {
            return redirect()->back();
        }
    }
    
    public function verifyOtp(Request $request)
    {
        // dd($request->input());
        $rules = [
            'otp' => 'required'
        ];
        
        $this->validate($request, $rules);
        
        if ($request->otp == session()->get('otp')) {
            return redirect('user/password-reset')->with('success', 'Reset your password');
        } else {
            return back()->with('error', "OTP didn't match!");
        }
    }
    public function verifyOtp2(Request $request)
    {
        // dd($request->input());
        $rules = [
            'otp' => 'required'
        ];
        
        $this->validate($request, $rules);
        
        if ($request->otp == session()->get('otp')) {
            return redirect('user/register-complete')->with('success', 'Welcome! Please complete your registration');
        } else {
            return back()->with('error', "OTP didn't match!");
        }
    }
    
    public function passwordResetUser(){
        if (session()->has('auth_phone')) {
            return view('frontend.password-reset');
        } else {
            return redirect()->back();
        }
    }
    public function saveResetPassword(Request $request){
        if(session()->has('auth_phone')){
            $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            ], [
                'password.required' => '*Password field is required.',
                'confirm_password.required' => '*Confirm password field is required.',
                'confirm_password.same' => '*Confirm password does not match with password.',
            ]);

            $findUserForUpdate = User::where('phone_number', session()->get('auth_phone'))->first();

            $update['password'] = Hash::make($request->password);
            $findUserForUpdate->update($update);

            toastr()->success('Password reset successfully');
            return redirect('user/login');
        }else{
            return redirect()->back();
        }
       
    }

    
    
}
