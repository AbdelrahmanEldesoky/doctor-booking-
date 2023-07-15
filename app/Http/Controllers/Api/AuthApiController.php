<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthApiController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

     public function register(Request $request){

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255', 'min:3'],
        //     'email' => ['required', 'string', 'email','max:255', 'unique:users,email'],
        //     'password' => ['required','min:6'],
        //     'confirm_password' => ['required', 'same:password'],
        //     'phone' => ['required']
        // ],['name.required'=> 'حقل الاسم مطلوب']);

  try{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role ?? 'user',
        'residence' => $request->residence ?? 'egyption'
    ]);
  }catch(Exception $e){
    return response()->json([
        'status'        => false,
        'msg'           => "Something went wrong",
        'data'          => $e
    ]);
  }
        $request->merge(['user_id'=>$user->id]);
        UserInformation::create($request->all());

        $token = auth('api')->login($user);

        return response()->json([
            'status'        => true,
            'msg'           => "Success",
            'data'          => $this->respondWithToken($token)
        ]);
    
    }
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json([
            'status'        => true,
            'msg'           => "Success",
            'data'          => $this->respondWithToken($token)
        ]);
      
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        
        return response()->json([
            'status'        => true,
            'msg'           => "Success",
            'data'          => auth('api')->user()
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();
        return response()->json([
            'status'        => true,
            'msg'           => "Success",
            'data'          => ['message' => 'Successfully logged out']
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json([
            'status'        => true,
            'msg'           => "Success",
            'data'          => $this->respondWithToken(auth('api')->refresh())
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {

        return response()->json([
            'status'        => true,
            'msg'           => "Success",
            'data'          => 
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]
        ]);
    }
}