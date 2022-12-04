<?php

namespace App\Http\Requests\Song;

use App\Models\Album;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'album_id' => ['exists:'.Album::class.',id'],
            'name' => ['required','string','max:120'],
            'lyric' => ['required','string','min:1','max:8500'],
        ];
    }
}
