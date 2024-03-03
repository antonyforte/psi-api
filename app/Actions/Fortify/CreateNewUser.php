<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Therapist;
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
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
        $num_therapists = Therapist::where('usuario', $input['name'])->count();

        if ($num_therapists == 0){
            $therapist = new Therapist(['usuario' => $input['name']]);
            $therapist->save();
        }else {
            $therapist = new Therapist(['usuario' => "{$input['name']}({$num_therapists})"]);
            $therapist->save();
        }
        

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'therapist_id' => $therapist->id,
        ]);

        
        $user->save();
        return $user;
    }
}
