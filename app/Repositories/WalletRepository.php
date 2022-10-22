<?php 
namespace App\Repositories;
use App\Interfaces\WalletInterface;
use Illuminate\Support\Facades\Http;

class WalletRepository implements WalletInterface{
	function __construct(){
		$this->walletTransferApi = 'http://127.0.0.1:8000/v1/walletTransfer';
		$this->walletListApi = 'http://127.0.0.1:8000/v1/transactionList';
		$this->userListApi = 'http://127.0.0.1:8000/v1/userList';
		$this->walletTransferApi = 'http://127.0.0.1:8000/v1/walletTransfer';
		$this->highestTransactionApi = 'http://127.0.0.1:8000/v1/highestTransaction';
	}

	public function transactionList(){
		$token = session()->get('token');
		$transactionList = Http::withToken($token)->get($this->walletListApi);

		$arrResponse = json_decode($transactionList,true);
		
		if($arrResponse['status'] == 200){
			$response = $arrResponse['data'];
			return $response;
		}else{
			$response = $arrResponse['message'];
			return $response;
		}
		
	}

	public function userList(){
		$token = session()->get('token');
		$transactionList = Http::withToken($token)->get($this->userListApi);

		$arrResponse = json_decode($transactionList,true);

		return $arrResponse;
		
	}
	public function saveTransferData($postData){
		$token = session()->get('token');
		$response = Http::withToken($token)->post($this->walletTransferApi, [
			'user_id' => $postData['user_id'],
			'currency' => $postData['currency'],
			'amount' => $postData['amount'],
		]);

		$response = json_decode($response, true);
        return $response;
	}

	public function highestTransaction(){
		$token = session()->get('token');
		$transactionList = Http::withToken($token)->get($this->highestTransactionApi);

		$arrResponse = json_decode($transactionList,true);

		return $arrResponse;
	}

	public function getCurrencyRate(){
		$curl = curl_init();
		$baseCurrency = session()->get('currency');
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.apilayer.com/fixer/latest?&base=$baseCurrency",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: 5SmfjRr2BTcbBuvdSgUS1rljM4sQaPnd"
          ),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        return $response;
	}
	
}
?>