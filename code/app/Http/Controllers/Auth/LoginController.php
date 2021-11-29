<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return Response
     */
    public function showLoginForm(): Response
    {
        return response()
            ->view('auth.login')
            ->header('Cache-Control', 'no-store');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     *
     * @return HttpFoundation\Response
     *
     * @throws ValidationException
     */
    public function login(Request $request): HttpFoundation\Response
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (false == $this->attemptLogin($request)) {
            $this->incrementLoginAttempts($request);

            $request
                ->session()
                ->flash(
                    'error',
                    'ログインできませんでした。メールアドレスとパスワードを再度入力してください。'
                );

            return $this->sendFailedLoginResponse($request);
        }

        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

        return $this->sendLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return HttpFoundation\Response
     */
    public function logout(Request $request): HttpFoundation\Response
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        if ($request->wantsJson()) {
            return new JsonResponse([], 204);
        }

        $request
            ->session()
            ->flash(
                'info',
                'ログアウトしました。ご利用ありがとうございました。'
            );

        return redirect()
            ->route('index');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     *
     * @return RedirectResponse | JsonResponse
     */
    protected function sendLoginResponse(Request $request): JsonResponse|RedirectResponse
    {
        $request
            ->session()
            ->regenerate();

        $this
            ->clearLoginAttempts($request);

        $response = $this->authenticated($request, $this->guard()->user());
        if ($response) {
            return $response;
        }

        if ($request->wantsJson()) {
            return new JsonResponse([], 204);
        }

        $request
            ->session()
            ->flash(
                'info',
                sprintf('いらっしゃいませ %s さん。', $this->guard()->user()->name)
            );

        return redirect()
            ->route('index');
    }
}
