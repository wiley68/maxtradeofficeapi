<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT'){
            return [
                'user_id' => ['required', 'exists:users,id'],
                'name' => ['required', 'string'],
                'description' => ['nullable', 'string', 'max:256'],
                'icon' => ['nullable', 'string', 'max:24'],
                'parent_id' => ['nullable', 'exists:tasks,id'],
                'info' => ['nullable', 'string'],
            ];    
        }else{
            return [
                'user_id' => ['sometimes', 'required', 'exists:users,id'],
                'name' => ['sometimes', 'string'],
                'description' => ['sometimes', 'nullable', 'string', 'max:256'],
                'icon' => ['sometimes', 'nullable', 'string', 'max:24'],
                'parent_id' => ['sometimes', 'nullable', 'exists:tasks,id'],
                'info' => ['sometimes', 'nullable', 'string'],
            ];
        }
    }
}
