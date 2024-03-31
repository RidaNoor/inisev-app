<?php

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

trait ValidationError
{
    /**
     * Throw exception error in case of failed validation.
     */
    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
        ], 400));
    }
}
