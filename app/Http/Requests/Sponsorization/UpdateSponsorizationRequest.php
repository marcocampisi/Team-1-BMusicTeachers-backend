<?php

namespace App\Http\Requests\Sponsorization;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSponsorizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'name'=> 'required',
           'price'=> 'required|decimal:0,2|min:0.01',
           'duration' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'il nome della sponsorizzazione è obbligatorio',
            'price.required' => 'il prezzo della sponsorizzazione è obbligatorio',
            'price.decimal' => 'il valore inserito nel campo prezzo non è valido',
            'price.min' => 'il valore inserito nel campo prezzo deve essere superiore a 0.01€',
            'duration.required' => 'la durata della sponsorizzazione è obbligatoria',
            'duration.integer' => 'il valore della durata della sponsorizzazione non è valido',
        ];
    }
}
