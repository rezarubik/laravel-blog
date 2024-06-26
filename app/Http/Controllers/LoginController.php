<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            // 'title' => 'Login',
        ]);
    }

    /**
     * NOTE: Handling login authenticate
     */
    public function authenticate(Request $request)
    {
        // todo 1: validate input email dan password
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    }
}
