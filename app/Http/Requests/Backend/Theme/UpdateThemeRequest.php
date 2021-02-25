<?php

namespace App\Http\Requests\Backend\Theme;

use App\Domains\Auth\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateRoleRequest.
 */
class UpdateThemeRequest extends FormRequest
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
        return [
            'title' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'description' => 'sometimes|string',
            'page_content' => 'nullable|string',
            'email' => 'required|email',
            'is_active' => 'sometimes|boolean',
            'media.*' => 'nullable|image',
            'resume' => 'nullable|file',
            'background_image' => 'nullable|image',
            'about_image' => 'nullable|image',
            'is_maintenance_mode' => 'sometimes|boolean',
            'contact_active' => 'sometimes|boolean',
            'resume_active' => 'sometimes|boolean',
            'background_video_active' => 'sometimes|boolean',
            'primary_color' => '#FDB716',
            'secondary_color' => '#0099cc',
            'background_color' => '#004C4C',
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
        throw new AuthorizationException(__('You can not update themes.'));
    }
}
