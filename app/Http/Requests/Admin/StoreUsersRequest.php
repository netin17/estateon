<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone|regex:/^[0-9\+\-\s]{10,15}$/',
            'password' => 'required',
            'roles' => 'required'
        ];
    }
    protected function prepareForValidation()
    {
        if ($this->has('phone')) {
            $this->merge([
                'phone' => $this->normalizePhoneNumber($this->input('phone')),
            ]);
        }
    }

    private function normalizePhoneNumber($phone)
    {
        $re = '/^(?:\+?91|0)?/m';
        $ccode = '+91';
        return preg_replace($re, $ccode, $phone);
    }
}
