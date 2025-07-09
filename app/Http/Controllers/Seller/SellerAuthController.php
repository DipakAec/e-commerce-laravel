<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('seller.auth.register');
    }
    public function showLoginForm()
    {
        return view('seller.auth.login');
    }
}
