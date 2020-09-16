<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.user.edit');
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
            'email' => 'required|max:255',
            'sex' => 'required',
            'avatar' => 'nullable|string|max:255',
            'roles' => 'nullable|array',
            'permissions' => 'nullable|array',
        ];
    }
    protected function prepareForValidation()
    {
        if (! empty($this->request->get('permissions'))) {
            $this->request->set('permissions', array_filter($this->request->get('permissions')));
        }
        if (! empty($this->request->get('roles'))) {
            $this->request->set('roles', array_filter($this->request->get('roles')));
        }
    }
}
