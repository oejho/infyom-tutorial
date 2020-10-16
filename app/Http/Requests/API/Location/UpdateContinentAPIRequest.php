<?php

namespace App\Http\Requests\API\Location;

use App\Models\Location\Continent;
use InfyOm\Generator\Request\APIRequest;

class UpdateContinentAPIRequest extends APIRequest
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
        $rules = Continent::$rules;
        
        return $rules;
    }
}
