<?php

namespace App\Http\Requests\V1\Admin\Room;

use App\Enum\StatusRoom;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'room_number'  => ['required', 'string'],
            'type_room_id' => ['required', 'exists:type_rooms,id'],
            'status' => ['required', 'string', new Enum(StatusRoom::class)],


        ];

    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => strtoupper($this->status),
        ]);
    }

}
