<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\User;

class IncidenciaController extends Controller
{
    public function __construct(){
        // $this->middleware('own')->only('edit', 'destroy'); 
        $this->middleware('admin')->only('admin');
    }
       
    public function index($filtro = false) {
        if ($filtro) {
            $incidencias=Incidencia::join('users', 'incidencias.teacherid', '=', 'users.id')->where('status', $filtro)->orderby('incidencias.updated_at', 'desc')->Paginate(5, ['incidencias.*','users.name']);
        } else {
            $incidencias=Incidencia::join('users', 'incidencias.teacherid', '=', 'users.id')->orderby('incidencias.updated_at', 'desc')->Paginate(5, ['incidencias.*','users.name']);
        }
        return view('dashboard', compact('incidencias'));
    }

    public function create() {
        return view('incidenciasCreate');
    }

    public function store(Request $request) {
        Incidencia::create($request->all());
        return redirect()->route('dashboard');
    }

    public function edit($id) {
        $incidencia = Incidencia::find($id);
        return view('incidenciasEdit',compact('incidencia'));
    }

    public function admin($id) {
        $incidencia = Incidencia::find($id);
        return view('incidenciasAdmin',compact('incidencia'));
    }

    public function update(Incidencia $incidencia, Request $request){
        $incidencia->update($request->all());
        return redirect()->route('dashboard');
    }

    public function destroy($id){
        Incidencia::find($id)->delete();
        return redirect()->route('dashboard');
    }   

}
