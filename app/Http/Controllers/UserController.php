<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Hash;
use illuminate\Database\Eloquent\SoftDeletes;
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
        // dd($user);

        try{
            $validator = Validator::make($request->all(),[
                'nome' => ['required', 'string', 'max:255'],
                'area' => ['required', 'string', 'max:255'],
                'lattes' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
            ])->validateWithBag('user');
            $user->update(['nome'=>$request->input('nome')]);
            $user->update(['area'=>$request->input('area')]);
            $user->update(['lattes'=>$request->input('lattes')]);
            $user->update(['email'=>$request->input('email')]);
            $user->update(['password'=>Hash::make($request->input('nome'))]);
            return view('Users.index');

        }catch(Exception $e){
            dd($e);
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
        $date = $today = date("Y-m-d H:i:s.000",time());
        if($user = User::find($id)){
            \DB::table('users')->where('id', $id)->update(['deleted_at' => $date]);
            // $user->delete();
        }
        return redirect()->route('users.index');
    }
}
