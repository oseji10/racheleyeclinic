<?php

namespace App\Http\Requests;

use App\Models\Nurse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFrontDeskRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $rules = FrontDesk::$rules;
        $rules['password'] = 'same:password_confirmation|min:6';
        $rules['email'] = 'required|email:filter|unique:users,email,'.$this->route('frontdesk')->user->id;
        $rules['image'] = 'mimes:jpeg,jpg,png,gif';

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'image.mimes' => __('messages.user.validate_image_type'),
        ];
    }
}
