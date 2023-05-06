<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class SanctumAuthController extends Controller
{
    public function registro(Request $request)
    {
        $request->validate([
            'id'=> 'required',
            'usuario' => 'required|unique:usuario',
            'contra' => 'required|confirmed',
            'nivel' => 'required', 
            'estado' => 'required'
        ]);

        $user = new User();
        $user->id=$request->id;
        $user->usuario=$request->usuario;
        $user->contra=Hash::make($request->contra);
        $user->nivel=$request->nivel;
        $user->estado=$request->estado;
        $user->save();

        return response()->json(["mensaje"=>"Usuario registrado correctamente"],201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'contra' => 'required'
        ]);

        $user = User::where("usuario","=",$request->usuario)->where("nivel","=",2)->first();
        if(isset($user))
        {
            if(Hash::check($request->contra, $user->contra))
            {
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json(["message"=>"Se inicio sesión correctamente","access_token" => $token,"error"=>false],201);
            }else{
                return response()->json(["message"=>"Contraseña incorrecta","error"=>true],200);
            }
        }else{
            return response()->json(["message"=>"El usuario no existe","error"=>true],200);
        }

        return response()->json(["mensaje"=>"Usuario registrado correctamente"],201);
    }

    public function obtenerCupon()
    {
        return FacadesAuth::user();
    }
}
