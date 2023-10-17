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
            'cv'=> 'nullable|max:2048|mimes:pdf',
            'photo'=> 'nullable|image|max:8192',
            'phone'=> 'required|min:0|regex:/^[0-9]{10}$/', 
            'service'=> 'required', 
            'subject'=> 'required|array',
        ];
    }

    public function messages(){
        return [
            'user_id.exists'=> 'l\'utente non esiste',
            'cv.max'=> 'il file pdf è troppo pesante ',
            'cv.mimes'=> 'il formato del file inserito non è valido',
            'photo.image'=> 'il file dell\'immagine non è una immagine',
            'photo.max'=> 'il file dell\'immagine è troppo pesante',
            'phone.required'=> 'il numero di telefono è obbligatorio',
            'phone.regex'=> 'il numero di telefono non è nel formato corretto',
            'service.required'=> 'il tipo di servizio offerto è obbligatorio',
            'subject.required'=> 'Lo strumento insegnato offerto è obbligatorio'
        ];
    }
}
