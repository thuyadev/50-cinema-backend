<?php

namespace App\Http\Requests\Dashboard;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ShowTimeFormRequest extends FormRequest
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
        $start_date = Carbon::parse($this->start_date)->format('y-m-d');
        $end_date = Carbon::parse($this->end_date)->format('y-m-d');

        $this->merge([
            'start_date' => $start_date,
            'end_date' => $end_date
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
            'start_date' => 'required',
            'end_date' => 'required',
            'movie_id' => 'required',
            'theater_show_times' => 'required|json',
        ];
    }
}
