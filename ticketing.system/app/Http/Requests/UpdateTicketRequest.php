<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
        return [
            //
            // 'user_id' => 'required',
            'title' => 'string',
            'description' => 'string',
            'priority_level_id'=>'exists:priority_levels,id',
            'status_type_id' => 'exists:status_types,id',
            'category_id' => 'exists:categories,id',
        ];
    }
}
