<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'assign_user_id'=>'exists:users,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'priority_level_id'=>'required|exists:priority_levels,id',
            'status_id' => 'required|exists:statuses,id',
            'categories_id' => 'required|exists:categories,id',
        ];
    }
}
