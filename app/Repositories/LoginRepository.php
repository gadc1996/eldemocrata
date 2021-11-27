<?php 

namespace App\Repositories;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

use App\User;

class LoginRepository
{
    protected $model;

    public function __construct(user $user)
    {
        $this->model = $user;
    }

    public function login(array $credentials): jsonResponse
    {
        $user = User::where('email', $credentials['email'])->firstOrFail();
        \Log::info($credentials);
        \Log::info($user->password);
        if (Hash::check($credentials['password'], $user->password)) {
            return response()->json(['data' => $user]);
        } else {
            return response()->json([], 401);
        }
    }
}
