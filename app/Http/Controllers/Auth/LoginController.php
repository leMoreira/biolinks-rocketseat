<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(MakeLoginRequest $request){

if($request->attempt())
{

    return to_route('dashboard');

}



                    return back()->with(['message' => 'Não deu certo']);

                        // abort_unless($user, 403 );
                    // abortar ao menos
                }
}
