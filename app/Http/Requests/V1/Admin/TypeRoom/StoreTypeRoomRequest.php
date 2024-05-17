<?php

namespace App\Http\Requests\V1\Admin\TypeRoom;

use App\Enum\AmenityGroup;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRoomRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'capacity' => ['required', 'numeric'],
            'extra_person' => ['required', 'boolean'],
            'thumbnail_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:1024'],
            'pictures'     => ['required', 'array'],
            'pictures.*'   => ['required', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:1024'],
            'bed'   => ['required', 'array'],
            'bed.*' => ['required', 'json'],
            'description' => ['nullable', 'string'],
            'amenities'   => ['nullable', 'array'],
            'amenities.*.title'  => ['required', 'string'],
            'price' => ['required', 'numeric'],
        ];
    }

}
