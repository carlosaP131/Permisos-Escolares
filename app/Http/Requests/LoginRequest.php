<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        dd('hola');
        return [
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ];
    }

    public function gerCredentials()
    {
        $username = $this->get("username");

        if ($this->isEmail($username)) {
            return [
                "email" => $username,
                "password" => $this->get('password')
            ];
        }

        return [
            "name" => $username,
            "password" => $this->get('password')
        ];;
    }

    public function isEmail($email)
    {
        $factory = app(ValidationFactory::class)->make(["email" => $email], ["email" => "email"]);
        return !$factory->fails();
    }
}
