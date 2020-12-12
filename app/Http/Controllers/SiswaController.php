<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::select('*');

        $search_filter = $request->search_filter;

        if($search_filter != null) {
            $users = $users->where('name', 'like', '%'.$search_filter.'%');
        }

        $users = $users->where('role', '=', 'siswa');

        $users = $users->orderBy("name", "ASC")->paginate(5);

        return view('admin.siswa.home', compact('users'));
        // return dd($siswas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = $request->all();
        

        $name = $users['name'];
        // $role = $users['role'];
        $description = $users['description'];
        $nomer_induk = $users['nomer_induk'];
        $email = $users['email'];
        $password = $users['password'];

        $data = new User;
        if($name == null){
            $data->name = '-';
        } else {
            $data->name = $name;
        }
        
        $data->role = 'siswa';
        
        if($description == null){
            $data->description = '-';
        } else {
            $data->description = $description;
        }
        
        if($nomer_induk == null){
            $data->nomer_induk = '-';
        } else {
            $data->nomer_induk = $nomer_induk;
        }

        if($email == null){
            $data->email = '-';
        } else {
            $data->email = $email;
        }
        
        $data->password = $password;
        $data->save();

        return back()->with('message', 'Data Created');
        // return dd($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $users = $request->all();

        $name = $users['name'];
        $description = $users['description'];
        $nomer_induk = $users['nomer_induk'];
        $email = $users['email'];
        $password = $users['password'];

        $data = User::find($id);;
        if($name == null){
            $data->name = '-';
        } else {
            $data->name = $name;
        }
        
        $data->role = 'siswa';
        
        if($description == null){
            $data->description = '-';
        } else {
            $data->description = $description;
        }
        
        if($nomer_induk == null){
            $data->nomer_induk = '-';
        } else {
            $data->nomer_induk = $nomer_induk;
        }

        if($email == null){
            $data->email = '-';
        } else {
            $data->email = $email;
        }

        if($password == null){
            $data->password = '-';
        } else {
            $data->password = $password;
        }

        $data->save();

        return back()->with('message', 'Data Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);

        $data->delete();

        return back()->with('message', 'Data Deleted');
    }
}
