<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PermissionEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.permission.edit');
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
            'description' => 'nullable|string',
            'users' => 'nullable|array',
            'roles' => 'nullable|array',

        ];
    }

    protected function prepareForValidation()
    {
        if (! empty($this->request->get('roles'))) {
            $this->request->set('roles', array_filter($this->request->get('roles')));
        }
        if (! empty($this->request->get('users'))) {
            $this->request->set('users', array_filter($this->request->get('users')));
        }
    }
}
