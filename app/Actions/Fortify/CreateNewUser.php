<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'min:5', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:64', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->initialize();

        $slug = Str::of($user->name)->slug('-');

        //Check if this Slug already exists 
        $checkSlug = $user->whereSlug($slug)->exists();

        if ($checkSlug) {
            //Slug already exists.
                $newSlug = $slug . "-" . $user->id; 
                $newSlug = Str::slug($newSlug); //String Slug
                $slug = $newSlug; //New Slug 
        }

        $user->slug = $slug;
        $user->save();

        return $user;
    }
}
