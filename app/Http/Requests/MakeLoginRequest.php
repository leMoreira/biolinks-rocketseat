<?php

namespace App\Http\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
/**
 * Handle login request
 * @property-read string $email
 * @property-read string $password
 */


class MakeLoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function attempt(){

        if(
            $user = User::query()
                    ->where('email', '=', $this->email)
                    ->first()) {


                        if(Hash::check($this->password, $user->password)){
                            auth()->login($user);

                            return to_route('dashboard');
                        }


                    }

    }

}