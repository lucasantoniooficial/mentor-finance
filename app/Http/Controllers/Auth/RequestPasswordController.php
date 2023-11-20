<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class RequestPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.request-password');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink($data);

        return $status == Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
