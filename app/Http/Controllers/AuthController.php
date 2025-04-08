<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponseTrait;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait;
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        return $this->authService->register($validated);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        return $this->authService->login($credentials);
    }



    //user profile
    public function userProfile(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

       return $this->successResponse( null,'Logged out successfully' );  
         
    }

    // public function show($id)
    // {
    //     $post = $this->userService->getPost($id);
    //     return view('post.show', compact('post'));
    // }
}
