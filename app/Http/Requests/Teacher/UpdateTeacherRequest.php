<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'user_id'=> 'nullable|exists:users,id',
            'bio'=> 'nullable',
            'cv'=> 'nullable|max:2048', //discutere
            'photo'=> 'nullable|image|max:2048',
            'phone'=> 'required', 
            'service'=> 'required', 
        ];
    }

    public function messages(){
        return [
            'user_id.exists'=> 'l\'utente non esiste',
            'cv.max'=> 'il nome del file è troppo lungo',//discutere
            'photo.image'=> 'il file dell\'immagine non è una immagine',
            'photo.max'=> 'il nome del file è troppo lungo',//discutere
            'phone.required'=> 'il numero di telefono è obbligatorio',
            'phone.service'=> 'il numero di telefono è obbligatorio'
        ];
    }
}
