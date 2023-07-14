<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');
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
                'task_id' => ['required', 'exists:tasks,id'],
                'user_id' => ['required', 'exists:users,id'],
                'subject' => ['required', 'string', 'max:256'],
                'info' => ['nullable', 'string'],
            ];    
        }else{
            return [
                'task_id' => ['sometimes', 'required', 'exists:tasks,id'],
                'user_id' => ['sometimes', 'required', 'exists:users,id'],
                'subject' => ['sometimes', 'required', 'string', 'max:256'],
                'info' => ['sometimes', 'nullable', 'string'],
            ];
        }
    }
}
