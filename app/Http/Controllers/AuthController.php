<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponseTrait;
use App\Services\AuthService;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait;
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterUserRequest $request)
    {
        return $this->authService->register($request->validated());
    }

    public function login(LoginUserRequest $request)
    {
        return $this->authService->login($request->validated());
    }


    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

       return $this->successResponse( null,'Logged out successfully' );  
         
    }

    public function destroy($id)
    {

      return $this->authService->delete($id);
       
       
    }
    

}
