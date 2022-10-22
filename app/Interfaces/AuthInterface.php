<?php

namespace App\Interfaces;

interface AuthInterface
{
    public function checkLogin($requestData);
    public function logout();
}
