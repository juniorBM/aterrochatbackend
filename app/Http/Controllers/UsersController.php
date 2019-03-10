<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function add(Request $request)
    {
        $data = $request->all();
//        dd($data);

        $messages = [
            'name.required' => 'Nome obrigatório!',
            'lastname.required' => 'Sobrenome obrigatório!',
            'email.unique' => 'Email já em uso!',
            'email.required' => 'Email obrigatório!',
            'password.required' => 'Senha obrigatório!'
        ];

        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ], $messages);

        $data['password'] = app('hash')->make($data['password']);
        $user = User::create($data);
        $user->api_token = md5(str_random(32));
        $user->save();
        return response()->json(['status' => 'success', 'result' => $user]);
    }

}
