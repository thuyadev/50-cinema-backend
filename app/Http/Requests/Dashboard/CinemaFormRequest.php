<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CinemaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    protected function prepareForValidation(): void
    {
        if (!isset($this->visibility))
        {
            $this->merge([
                'visibility' => false
            ]);
        } else {
            $this->merge([
                'visibility' => true
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'town' => 'required',
            'visibility' => 'required',
            'address' => 'required',
            'image' => 'required|image|max:102400'
        ];
    }
}
