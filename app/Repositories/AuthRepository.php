<?php 
namespace App\Repositories;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Http;

class AuthRepository implements AuthInterface{
	function __construct(){
		$this->loginApi = 'http://127.0.0.1:8000/v1/auth/login';
		$this->logoutApi = 'http://127.0.0.1:8000/v1/auth/logout';
	}
	public function checkLogin($requestData){
		
		$response = Http::post($this->loginApi, [
            'email' => $requestData['email'],
            'password' => $requestData['password'],
        ]);
        $response = json_decode($response, true);

        if ($response['status'] == 200) {
            session()->put('name', $response['user']['user_name']);
            session()->put('email', $response['user']['user_email']);
            session()->put('currency', $response['user']['currency']);
            session()->put('token', $response['access_token']);
            // $prevUrl = session()->pull('prev_url');
            // return redirect($prevUrl['url']);
            return $response;
        } else if ($response['status'] == 401) {
            return $response;
        }
	}

	public function logout(){
		return $this->logoutApi;
	}
}
?>