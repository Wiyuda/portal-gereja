<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiftRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sector_id' => 'required|numeric',
            'family_id' => 'required|numeric',
            'family_member_id' => 'required|unique:shifts,family_member_id',
            'status' => 'required|string', 
            'tgl' => 'required|date',
            'gereja' => 'required|string',
            'keterangan' => 'required|string'
        ];
    }
}
