<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view("Users.index",['data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('Users.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('Users.edit',['data'=>$data]);
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
        $user = User::find($id);
        try{
            $request->validateWithBag('user',[
                'nome' => ['required', 'string', 'max:255'],
                'area' => ['required', 'string', 'max:255'],
                'lattes' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
            $user->update(['nome'=>$request->input('nome')]);
            $user->update(['area'=>$request->input('area')]);
            $user->update(['lattes'=>$request->input('lattes')]);
            $user->update(['email'=>$request->input('email')]);
            $user->update(['password'=>Hash::make($request->input('nome'))]);
            return view('Users.show')->with('user',$user);
            
        }catch(Exception $e){
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($user = User::find($id)){
            $user->delete();
        }
        return redirect()->route('home');
    }
}
