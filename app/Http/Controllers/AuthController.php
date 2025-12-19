<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectByRole());
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function loginByPhone(Request $request)
    {
        $data = $this->validateBaseInput($request);

        $user = $this->findUser($data);

        if (! $user) {
            $this->validateUniqueOnRegister($data);
            $user = $this->registerUser($data);
        }

        $this->loginUser($request, $user);

        return redirect()->intended($this->redirectByRole());
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /* =========================
     |  Validation
     ========================= */

    protected function validateBaseInput(Request $request): array
    {
        return $request->validate([
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'name'  => ['nullable', 'string'],
        ]);
    }

    protected function validateUniqueOnRegister(array $data): void
    {
        Validator::make($data, [
            'email' => ['nullable', 'email', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'unique:users,phone'],
        ])->validate();
    }

    /* =========================
        |  Helper Methods
     ========================= */
    protected function redirectByRole()
    {
        return match (auth()->user()->role) {
            'admin'   => '/admin/dashboard',
            'user' => '/',
            default   => '/',
        };
    }
    protected function findUser(array $data): ?User
    {
        return User::query()
            ->when(!empty($data['phone']), fn ($q) =>
                $q->orWhere('phone', $data['phone'])
            )
            ->when(!empty($data['email']), fn ($q) =>
                $q->orWhere('email', $data['email'])
            )
            ->first();
    }

    protected function registerUser(array $data): User
    {
        return User::create([
            'name'     => $data['name'] ?? 'Guest User',
            'email'    => $data['email'] ?? null,
            'phone'    => $data['phone'] ?? null,
            'password' => Hash::make('password'),
            'role'     => 'user', 
        ]);
    }

    protected function loginUser(Request $request, User $user): void
    {
        Auth::login($user, true);
        $request->session()->regenerate();
    }
}