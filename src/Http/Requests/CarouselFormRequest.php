<?php

namespace Meccado\CarouselAdmin\Http\Requests;

use Meccado\CarouselAdmin\Http\Requests\Request;

class CarouselFormRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
          'name'          => 'required|min:3|unique:carousels',
          'description'   => 'required|min:3',
        ];
    }
}
