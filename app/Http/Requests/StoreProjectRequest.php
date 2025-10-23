<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Service\Asserts\AssertLength;
use App\Service\Asserts\AssertRequired;
use App\Service\Asserts\Constrains;

class StoreProjectRequest extends FormRequest
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
            'name' => Constrains::create(
                new AssertRequired(), 
                new AssertLength(3)
            ), 
            'description' => Constrains::create(), 
            'priority' => Constrains::create(), 
        ];
    }
}
