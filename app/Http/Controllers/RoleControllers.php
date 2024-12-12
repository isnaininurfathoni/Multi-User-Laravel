<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RoleControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Menu pencarian
        $katakunci=$request->katakunci;
        if(strlen($katakunci)){
            $data = User::where('name','like',"%$katakunci%")
            ->orWhere('role','like',"%$katakunci%")->paginate(10);
        }else{
            $data= User::paginate(10);
        }
        return view('role')->with('data',$data);
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
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        Session::flash('password',$request->email);
        Session::flash('role',$request->role);

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'role'=>'required|in:administrator,teknisi,superuser',
        ],[
            'name.required'=>'Nama wajib di isi',
            'email.required'=>'Email Wajib diisi',
            'email.unique'=>'Email sudah terdaftar,gunakan email lain',
            'password.required'=>'Password Wajib diisi',
            'password.min'=>'Minimal Password 8 karakater',
            'role'=>'Masukan Role',
            'role.in'=>'Role yang anda masukan tidak sesuai'

        ]);
        
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        //kirim data ke database
        User::create($data);
        return redirect('/role-management')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
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
        $data= User::where('name',$id)->first();
        return view('edit')->with('data',$data);
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
            'role'=>'required|in:administrator,teknisi,superuser',
        ],[
            'role'=>'Masukan Role',
            'role.in'=>'Role yang anda masukan tidak sesuai'

        ]);
        
        $data = [
            'role'=>$request->role,
        ];
        //kirim data ke database
        User::where('name',$id)->update($data);
        return redirect('/role-management')->with('success','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('name', $id)->delete();
        return redirect()->to('role-management')->with('success','Data berhasil dihapus');
    }
}
