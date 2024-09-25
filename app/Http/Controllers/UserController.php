<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function doLogin() {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6'
        ],[
            'email.required' => 'El email es obligatorio',
            'password.required' => 'La contraseña es obligatoria'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('welcome.login')->withErrors(['login' => 'Error al iniciar sesión']);
        }
    }

    public function register() {
        return view('welcome.register');
    }

    public function doCreate(Request $request) {
        $data = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6',
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
        ],[
            'email.required' => 'El email es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
            'name.required' => 'Tu nombre es obligatorio',
            'surname.required' => 'Tu apellido es obligatorio',
            'phone.required' => 'Tu teléfono es obligatorio'
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        return redirect()->route('rmessage')->with('result', $user ? 'Usuario creado correctamente' : 'No ha sido posible crear la cuenta');
    }

    public function profile() {
        return view('profile');
    }

    public function edit(Request $request) {
        $data = $this->validate($request, [
            'passwordNew' => 'nullable',
            'passwordNewConfirm' => 'nullable',
        ]);

        if ($data['passwordNew'] != null && $data['passwordNewConfirm'] != null) {
            $this->validate($request, [
                'passwordNew' => 'required|min:6',
                'passwordNewConfirm' => 'required|same:passwordNew',
            ], [
                'passwordNew.required'              => 'La nueva contraseña es obligatoria',
                'passwordNew.min'                   => 'La contraseña tiene que tener al menos 6 caracteres',
                'passwordNewConfirm.required'       => 'La contraseña de confirmación es obligatoria',
                'passwordNewConfirm.same'           => 'La contraseña de confirmación tiene que ser igual a la nueva contraseña',
            ]);

            $data['password'] = bcrypt($data['passwordNewConfirm']);

            Auth::user()->update($data);

            return $this->doLogout();
        } else {
            return redirect()->route('profile.index');
        }
    }

    public function doLogout() {
        Auth::logout();
        return redirect()->route('welcome.index');
    }
}
