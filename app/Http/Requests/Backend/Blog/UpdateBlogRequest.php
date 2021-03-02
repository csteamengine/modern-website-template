<?php

namespace App\Http\Requests\Backend\Blog;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateRoleRequest.
 */
class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //TODO update Rules
        return [
            'title' => 'required|string',
            'short_description' => 'nullable|string',
            'tags' => 'nullable|string',
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'external_url' => 'nullable|url',
            'is_active' => 'sometimes|boolean',
            'started_at' => 'nullable|date',
            'finished_at' => 'nullable|date|after_or_equal:started_at',
            'media.*' => 'nullable|mimes:pdf,jpeg,jpg,png,mp4',
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
        throw new AuthorizationException(__('You can not update blogs.'));
    }
}
