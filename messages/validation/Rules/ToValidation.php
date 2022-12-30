<?php

namespace Messages\validation\Rules;

use Illuminate\Contracts\Validation\Rule;

class ToValidation implements Rule
{
    private $data = [];
    private $message = "";

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!array_key_exists('type', $this->data))
            return true;


        $type = $this->data['type'];

        if ($type === 'sms' && !preg_match('/^(?:[0-9] ?){6,14}[0-9]$/', $value)) {
            $this->message = "to attribute not a valid phone number";
            return false;

        } elseif ($type === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->message = "to attribute not a valid email";
            return false;

        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
