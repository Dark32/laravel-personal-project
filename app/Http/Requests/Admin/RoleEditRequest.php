<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class RoleEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.role.edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'permissions' => 'nullable|array',
            'description' => 'nullable|string',
            'users' => 'nullable|array',
            'slug' => 'nullable|max:255',
        ];
    }

    protected function prepareForValidation()
    {
        if (! empty($this->request->get('permissions'))) {
            $this->request->set('permissions', array_filter($this->request->get('permissions')));
        }
        if (! empty($this->request->get('users'))) {
            $this->request->set('users', array_filter($this->request->get('users')));
        }
    }
}
