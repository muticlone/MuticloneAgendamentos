<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'user_type' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if ($value === 'root') {
                        $fail('Não é permitido cadastrar um usuário com o tipo "root".');
                    }
                },
            ],
            'phone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $pattern = '/^\(\d{2}\) \d{5}-\d{4}$/';
                    if (!preg_match($pattern, $value)) {
                        $fail('O campo ' . $attribute . ' deve estar no formato (99) 99999-9999.');
                    }
                },
            ],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' =>  $input['phone'],
            'user_type' => $input['user_type'],

        ]);
    }
}
