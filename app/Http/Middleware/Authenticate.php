<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class Authenticate extends BaseAuthenticate
{
    protected $user_route = 'user.login';
    protected $owner_route = 'owner.login';
    protected $admin_route = 'admin.login';

    /**
     * 未認証の場合、どこへリダイレクトするか？
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // APIリクエスト(JSON)ならリダイレクトは行わず null を返し、401 等を返す想定
        if (! $request->expectsJson()) {

            // ルート名が "owner.*" に一致するか？
            if (Route::is('owner.*')) {
                return route($this->owner_route);

            // ルート名が "admin.*" に一致するか？
            } elseif (Route::is('admin.*')) {
                return route($this->admin_route);

            // それ以外の場合、ユーザー用ログインページへ
            } else {
                return route($this->user_route);
            }
        }
    }
}
