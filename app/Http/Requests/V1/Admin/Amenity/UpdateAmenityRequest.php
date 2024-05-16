<?php

namespace App\Http\Requests\V1\Admin\Amenity;

use App\Enum\AmenityGroup;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAmenityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'group' => ['required', 'string', new Enum(AmenityGroup::class)],
            'lang'  => ['required']
        ];
    }
}
