<?php

namespace App\Http\Requests\Backend\Project;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreRoleRequest.
 */
class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO update authorize
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //TODO update rules
        return [
            'title' => 'required|string',
            'short_description' => 'sometimes|string',
            'description' => 'sometimes|string',
            'page_content' => 'sometimes|string',
            'external_url' => 'sometimes|url',
            'is_active' => 'sometimes|boolean',
            'started_at' => 'sometimes|date',
            'finished_at' => 'sometimes|date|after_or_equal:started_at',
            'media' => 'nullable|image',
        ];
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__('You can not create projects.'));
    }
}
