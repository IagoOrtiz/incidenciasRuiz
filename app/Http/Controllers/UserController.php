<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index() {
        $usuarios=User::where('admin', 0)->select('id', 'name', 'email', 'created_at', 'email_verified_at')->orderby('created_at')->Paginate(5);
        return view('incidenciasUsers', compact('usuarios'));
    }

    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('users');
    }   

    public function update($id){
        $usuario = User::find($id);
        $usuario->admin = true;
        $usuario->save();
        return redirect()->route('users');
    }
}
