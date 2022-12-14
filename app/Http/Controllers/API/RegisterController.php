<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function response;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
                }

                $input = $request->all();
            $user=User::create([

            'name' => $input['name'],

            'email' => $input['email'],

            'password' => Hash::make($input['password'])

        ]);
                $success['token'] =  $user->createToken('Laravel Password Grant Client')->accessToken;
                $success['name'] =  $user->name;

                return $this->sendResponse($success, 'User register successfully.');
            }

    /**
     * Login api
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
                    $success['name'] =  $user->name;
                    return $this->sendResponse($success, 'User login successfully.');
                }
                else{
        return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
                }
            }
}
