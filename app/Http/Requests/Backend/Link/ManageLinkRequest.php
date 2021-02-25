<?php

namespace App\Http\Requests\Backend\Link;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ManageLinkRequest.
 */
class ManageLinkRequest extends FormRequest
{
    /**
     * Determine if the link is authorized to make this request.
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
        ];
    }
}
