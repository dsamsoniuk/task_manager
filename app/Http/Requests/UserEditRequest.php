<?php


namespace App\Http\Requests;

use App\Service\Asserts\AssertEmail;
use App\Service\Asserts\AssertLength;
use App\Service\Asserts\AssertNullable;
use App\Service\Asserts\AssertRequired;
use App\Service\Asserts\AssertUnique;
use App\Service\Asserts\Constrains;
use Illuminate\Foundation\Http\FormRequest;
class UserEditRequest extends FormRequest
{
    public function rules(): array {
        return [
            'id' => '',
            'name' => Constrains::create(
                new AssertRequired(), 
                new AssertLength(3)
            ),
            'email' => Constrains::create(
                new AssertRequired(),
                new AssertEmail(),
                // new AssertUnique('users')
                new AssertUnique('users', 'email', $this->id)
            ),
            'password' => Constrains::create(
                new AssertNullable(),
                 new AssertLength(6)
            ),
        ];

    }
}
