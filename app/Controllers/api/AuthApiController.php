<?php

namespace App\Controllers\API;

use Core\Auth;
use Core\Controller;
use Core\Request;
use App\Models\User;

class AuthApiController extends Controller
{
    public function login()
    {
        $email = Request::post('email');
        $password = Request::post('password');

        if (!$email || !$password) {
            return $this->json(['error' => 'Email and password required'], 400);
        }

        $user = new User();
        $userData = $user->findByEmail($email);

        if (!$userData || !$user->verifyPassword($password, $userData['password'])) {
            return $this->json(['error' => 'Invalid credentials'], 401);
        }

        $token = Auth::generateToken($userData);

        return $this->json([
            'success' => true,
            'token' => $token,
            'user' => [
                'id' => $userData['id'],
                'email' => $userData['email'],
                'role' => $userData['role'],
            ]
        ]);
    }

    public function register()
    {
        $name = Request::post('name');
        $email = Request::post('email');
        $password = Request::post('password');

        if (!$name || !$email || !$password) {
            return $this->json(['error' => 'Name, email and password required'], 400);
        }

        $user = new User();
        $existing = $user->findByEmail($email);

        if ($existing) {
            return $this->json(['error' => 'Email already exists'], 409);
        }

        $userId = $user->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'admin',
        ]);

        $newUser = $user->find($userId);
        $token = Auth::generateToken($newUser);

        return $this->json([
            'success' => true,
            'token' => $token,
            'user' => [
                'id' => $newUser['id'],
                'email' => $newUser['email'],
                'role' => $newUser['role'],
            ]
        ], 201);
    }
}
