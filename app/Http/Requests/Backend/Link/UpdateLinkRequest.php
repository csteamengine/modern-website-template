<?php

namespace App\Http\Requests\Backend\Link;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateLinkRequest.
 */
class UpdateLinkRequest extends FormRequest
{
    /**
     * Determine if the link is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:191',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'external_url' => 'nullable|url',
            'is_active' => 'sometimes|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:started_at',
        ];
    }
}
