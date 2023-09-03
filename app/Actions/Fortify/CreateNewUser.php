<?php

namespace App\Actions\Fortify;

use App\Models\Utente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     * @throws ValidationException
     */
    public function create(array $input): Utente
    {
        Validator::make($input, [
            'nome' => ['required', 'string', 'max:20'],
            'cognome' => ['nullable', 'string', 'max:20'],
            'username' => ['required', 'string', 'max:30', Rule::unique(Utente::class)],
            'data_di_nascita' => ['required', 'date', 'before:' . Carbon::now()->subYears(18)->format('Y-m-d')], /* l'utente deve essere maggiorenne */
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Utente::class),
            ],
            'password' => $this->passwordRules(),
            'tipo' => ['nullable', 'in:1'],
            'partita_iva' => ['nullable', 'integer', 'digits:12']
        ])->validate();

        return Utente::create([
            'nome' => $input['nome'],
            'cognome' => !isset($input['tipo']) ? $input['cognome'] : null,
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'tipo' => isset($input['tipo']),
            'data_di_nascita' => $input['data_di_nascita'],
            'partita_iva' => isset($input['tipo']) ? $input['partita_iva'] : null
        ]);
    }
}
