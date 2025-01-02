<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

/**
 * @property-read string $name
 * @property-read string $email
 * @property-read string $password
 */

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
           'email' => ['required', 'email', 'confirmed','unique:users'],
           'password' => ['required',Password::defaults()],
        ];
    }

    public function tryToRegister(){
       // 1 criar um usuario

    //    $user = new User();
    //    $user->name = $this->name;
    //    $user->password = $this->password;
    //    $user->email = $this->email;

    //    $user->save();

$user = User::query()->create($this->validated());


// 2 logar no sistema

auth()->login($user);
return true;

    }

}
