<?php

namespace App\Http\Requests\event;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'event_name' => 'required|string',
            'payload' => 'nullable|array',
        ];
    }
    
    public function messages() 
    {
        return [
            'user_id.required' => 'user_id is required',
            'user_id.integer' => 'user_id must be integer type',
            'event_name.required' => 'the event must be have a name for create',
            'event_name.string' => 'event must be string type',
            'payload.json' => 'payload must be json type',
        ];
    }
}
