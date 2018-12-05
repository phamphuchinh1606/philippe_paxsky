<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use JWTAuthException;
use JWTAuth;
use Validator;

class LoginController extends ControllerApi
{
    public function login(Request $request){
        $rules = array(
            'email' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $isLogin = $this->userService->checkLogin($request->email, $request->password);
        if($isLogin){
            $credentials = $request->only('email', 'password');
            $token = null;
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'status'=> false,
                        'message'=> 'invalid email or password'
                    ]);
                }
            } catch (JWTAuthException $e) {
                return response()->json([
                    'status'=> false,
                    'message'=> 'failed to create token'
                ]);
            }
            return response()->json([
                'status'=> 0,
                'token'=> $token,
                'message'=>'Login success! '
            ]);
        }
        return response()->json([
            'status'=> false,
            'message'=> 'invalid email or password'
        ]);
    }
}
