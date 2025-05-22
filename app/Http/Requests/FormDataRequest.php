<?php

namespace App\Http\Requests;

use Themosis\Core\Http\FormRequest;
use Illuminate\Validation\Validator;

class FormDataRequest extends FormRequest
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
        $rules = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'rut' => [
                'required',
                'string',
                'regex:/^(\d{8}-[\dkK])$/',
            ],
            'fecha_nacimiento' => 'required|date',
        ];

        if ($this->method() == 'POST') {
            // array_push($rules['rut'], 'unique:form_data,rut');
            $rules['rut'][] = 'unique:form_data,rut';
        }else{

            // array_push($rules['rut'], 'unique:form_data,rut,'.$this->formData->id);
            $rules['rut'][] = 'unique:form_data,rut,'. $this->route('formData');
        }

        return $rules;
    }



    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() === 0) {
                if ($validator->errors()->count() === 0) {
                    $rut = preg_replace('/[^0-9kK]/i', '', $this->rut);
                    if (strlen($rut) < 9) {
                        dd('yeah');
                        $validator->errors()->add('rut', 'Formato de RUT invalido.');
                        return;
                    } 
            
                    $dv = substr($rut, -1);
                    $numero = substr($rut, 0, strlen($rut)-1);
            
                     $i = 2;
                     $suma = 0;
                    foreach(array_reverse(str_split($numero)) as $v) {
                        if ($i == 8) $i = 2;
                        $suma += $v * $i++;
                    }
            
                    $dve = 11 - ($suma % 11);
                    if ($dve == 11) $dve = 0;
                    if ($dve == 10) $dve = 'K';

                                        
                    if( strtoupper($dv) != strtoupper($dve)){
                        $validator->errors()->add('rut', 'El RUT es invalido.');
                    }
                }
            }
        });
    }


    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'apellido.required' => 'El apellido es requerido.',
            'apellido.max' => 'El apellido no puede tener más de 100 caracteres.',
            'apellido.string' => 'El apellido debe ser un texto.',
            'rut.required' => 'El RUT es requerido.',
            'rut.string' => 'El RUT debe ser un texto.',
            'rut.unique' => 'El RUT ya existe en el sistema, debe ser único',
            'rut.regex' => 'Formato de RUT inválido.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha.',
        ];
    }
}
