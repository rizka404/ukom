?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'Admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }
}
