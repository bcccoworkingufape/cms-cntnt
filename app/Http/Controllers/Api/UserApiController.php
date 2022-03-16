<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all()->toJSON(JSON_PRETTY_PRINT);
        return response($data, 200);
    }

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
            return response($user,200);

        }catch(Exception $e){
            return response($e,400);
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
        return response(null,200);
    }
}
