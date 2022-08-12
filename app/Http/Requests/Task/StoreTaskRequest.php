<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()
            ->user()
            ->can('task-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'user_assigned_id' => 'required',
            'client_external_id' => 'required',
            'deadline' => 'required',
            // 'filename' => 'required',
            // 'filename.*' => 'mimes:doc,pdf,docx,zip,jpg,jpeg,png',
        ];
    }
}
