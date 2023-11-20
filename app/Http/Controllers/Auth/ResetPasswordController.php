<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
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
        return view('auth.reset-password', [
            'token' => request()->token,
            'email' => request()->email
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $status = Password::reset(
            $data,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET ?
            redirect()->route('login')->with(['status' => __($status)])
            :
            back()->withErrors(['password' => __($status)]);
    }
}
