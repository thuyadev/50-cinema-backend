<?php

namespace App\Http\Requests\Dashboard;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MovieFormRequest extends FormRequest
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
        $release_date = Carbon::parse($this->initial_release_date)->format('y-m-d');

        $this->merge([
            'initial_release_date' => $release_date,
        ]);
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
            'description' => 'required',
            'initial_release_date' => 'required',
            'production_company' => 'required',
            'distributed_by' => 'nullable|string',
            'movie_length' => 'required',
            'trailer' => 'required',
            'movie_poster' => 'sometimes|required|image|max:102400',
            'language' => 'required',
            'genre_ids' => 'required',
            'genre_ids.*' => 'required',
            'crew_ids' => 'required',
            'crew_ids.*' => 'required',
            'images' => 'sometimes|required',
            'images.*' => 'sometimes|required|image|max:102400',
            'delete_photo_ids' => 'sometimes|required',
            'delete_photo_ids.*' => 'nullable',
        ];
    }
}
