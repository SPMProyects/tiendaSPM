<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Configuration;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUser;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        if($request->has("lista") && $request->input("lista") == "eliminados"){
            $users = User::onlyTrashed()->get();
        }else{
            $users = User::all();
        }

        return view('backend.users.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email',
            'address' => 'max:255',
            'password' => 'min:8',
        ]);

        User::create($request->only('name','email','address','admin') + ['password' => bcrypt($request->input('password'))]);

        session()->flash('status','El usuario se creo con exito');

        $data =[
            'name' => $request->name,
            'email' => json_decode(Configuration::findOrFail(1)->email_server)->sender,
        ];

        Mail::to($request->email)->queue(new NewUser($data));

        return view('backend.users.index')->with(['users' => User::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.users.edit')->with(['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email,'.$request->id,
            'address' => 'max:255',
            'password' => 'sometimes|nullable|min:8',
        ]);

        if($request->input('password') == ''){
            $data = $request->only('name','email','address','admin');
        }else{
            $data = $request->all();
            $data['password'] = bcrypt($request->input('password'));
        }

        User::findOrFail($id)->update($data);
        
        session()->flash('status','El usuario se edito con exito');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->has('eliminar')){
            User::withTrashed()->where('id', $id)->first()->forceDelete();
        }else{
            User::withTrashed()->where('id', $id)->first()->delete();
        }
        
        return redirect()->route('users.index')->with('status','Usuario eliminado correctamente');

    }

    public function exportImport(){
        return view('backend.users.export-import');
    }

    public function export(){
        
        return Excel::download(new UsersExport, 'user-list.xlsx');

    }

    public function import(){
        
    }
}
