<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\WalletInterface;

class WalletController extends Controller
{
    private WalletInterface $walletRepository;
    function __construct(WalletInterface $walletRepository){
        $this->walletContainer = $walletRepository;
    }

    public function dashboard(){
        if(session()->has('token')){
            
            $getCurrencyRate = $this->walletContainer->getCurrencyRate();
            $getCurrencyRate = json_decode($getCurrencyRate,true);
            return view('backend.dashboard',compact('getCurrencyRate'));
        }else{
            return redirect('/');
        }
    }

    public function transactionList(){
      if(session()->has('token')){
            $transactionList = $this->walletContainer->transactionList();
            $thirdHighestTransaction = $this->walletContainer->highestTransaction();
            $getUserList = $this->walletContainer->userList();
            return view('backend.walletList',compact('transactionList','getUserList','thirdHighestTransaction'));
        }else{
            return redirect('/');
        }  
    }

    public function moneyTransfer(Request $request){

        $transferData = $this->walletContainer->saveTransferData($request->all());

        if($transferData['status'] == 200){
            toastr()->success('Wallet transfer successfully');

            
            return back();
        }else{
            toastr()->error('Something went wrong');
            return back();
        }
        
    }
}
