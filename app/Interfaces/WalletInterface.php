<?php

namespace App\Interfaces;

interface WalletInterface
{
    public function transactionList();
    public function userList();
    public function saveTransferData($postData);
    public function highestTransaction();
    public function getCurrencyRate();
}
