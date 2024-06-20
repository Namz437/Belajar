<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
  
    {
        $response = [
            'success' => false,
            'message' => '',
            'data' => []
        ];

    try{

        $data = $request->validated();

        // insert ke database
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        // ubah response
        $response['success'] = true;
        $response['data'] = $user;
        $response['message'] = 'Register success';
    }catch(Exception $e){
        $response['message'] = $e->getMessage();
    }

        return response()->json($response);
    }

    public function login(LoginRequest $request)
    {
        $response = [
            'success' => false,
            'message' => '',
            'data' => []
        ];

        try{
            $data = $request->validated();

            // login
            if (!auth()->attempt($data)){
                throw new Exception('Email and Password not match');
            }

            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;


            $response ['success'] = true;
            $response ['message'] = 'Login success';
            $response ['data'] = [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ];
        }catch (Exception $e){
            $response['message'] = $e->getMessage();
        }

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout()
    {
        $response = [
            'success' => false,
            'message' => '',
            'data' => []
        ];

        try {
            $user = Auth::user();

            $user->tokens()->delete();
            $response['success'] = true;
            $response['message'] = 'Logout success';
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
