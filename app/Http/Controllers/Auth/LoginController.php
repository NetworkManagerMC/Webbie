<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $query = User::query()->whereUsername($request->input('username'));

        throw_unless($query->exists(), $this->failure());

        $user = $query->firstOrFail();

        throw_unless($this->checkPassword($user, $request->input('password')), $this->failure());

        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Check the provided password against the password for the user from the database.
     *
     * @param  User  $user
     * @param  string  $provided
     * @return bool
     */
    public function checkPassword(User $user, string $provided): bool
    {
        return Hash::check($provided, $user->password);
    }

    /**
     * The exception to be thrown for the authentication failures.
     *
     * @return ValidationException
     * @throws BindingResolutionException
     */
    public function failure(): ValidationException
    {
        return ValidationException::withMessages([
            'username' => __('auth.failed'),
        ]);
    }
}
