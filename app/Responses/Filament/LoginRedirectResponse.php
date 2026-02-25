<?php

namespace App\Responses\Filament;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class LoginRedirectResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        return redirect()->intended('/admin');
    }
}
