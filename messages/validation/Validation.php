<?php

namespace Messages\validation;

use Illuminate\Support\Facades\Validator;
use Messages\validation\Rules\ToValidation;
use Nette\Schema\ValidationException;


class Validation
{
    public static function validate($data)
    {
        $validator = Validator::make($data, [
            'type' => 'required|in:sms,email',
            'message' => 'required|string|min:1',
            'name' => 'nullable|string|max:255',
            'to' => ['required', new ToValidation($data)],
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toJson());
        }
        return true;
    }

}
