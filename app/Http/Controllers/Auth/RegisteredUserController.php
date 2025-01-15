<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Muestra la vista de registro.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Maneja una solicitud de registro entrante.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación de los datos recibidos
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'in:Cliente,UTE'], // Cliente o UTE
            'carnet' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'], // Requerido para UTE
            'celular_1' => ['required', 'string', 'max:15'], // Obligatorio
            'celular_2' => ['nullable', 'string', 'max:15'], // Opcional
        ]);

        // Manejo del archivo de carnet (solo para usuarios UTE)
        $carnetPath = null;
        if ($validatedData['user_type'] === 'UTE' && $request->hasFile('carnet')) {
            $carnetPath = $request->file('carnet')->store('carnets', 'public'); // Guardar en storage/app/public/carnets
        }

        // Creación del usuario con los datos validados
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'user_type' => $validatedData['user_type'],
            'carnet' => $carnetPath,
            'celular_1' => $validatedData['celular_1'],
            'celular_2' => $validatedData['celular_2'] ?? null, // Opcional
        ]);

        // Dispara el evento de registro
        event(new Registered($user));

        // Autentica automáticamente al usuario recién creado
        Auth::login($user);

        // Redirige al dashboard
        return redirect(route('dashboard'));
    }
}
