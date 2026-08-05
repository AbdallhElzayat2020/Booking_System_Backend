<?php

namespace App\Http\Requests\Admin\Package;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdatePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->has('name') && !$this->has('slug')) {
            $this->merge([
                'slug' => Str::slug($this->input('name'))
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $packageId = $this->route('package')?->id ?? $this->route('package');
        return [
            'package_type' => ['required', 'in:free,paid'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('packages', 'slug')->ignore($packageId)],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'number_of_days' => ['required', 'integer'],
            'number_of_listings' => ['required', 'integer'],
            'number_of_photos' => ['required', 'integer'],
            'number_of_videos' => ['required', 'integer'],
            'number_of_amenities' => ['required', 'integer'],
            'number_of_featured_listings' => ['required', 'integer'],
            'show_at_home' => ['required', Rule::in(['yes', 'no'])],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ];
    }
}
