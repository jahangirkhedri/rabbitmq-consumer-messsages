<?php

namespace Messages\tests;


use Messages\validation\Validation;

use Nette\Schema\ValidationException;

use Tests\TestCase;

class ValidationTest extends TestCase
{
    public function test_validation_is_ok()
    {
        $message = ['to' => '989377362289', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Your activation code is 22563.'];

        $response = Validation::validate($message);

        $this->assertTrue($response);
    }

    public function test_validation_with_invalid_email()
    {
        $message = ['to' => '989377362289', 'type' => 'email', 'name' => 'jahan', 'message' => 'Your activation code is 22563.'];
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('{"to":["to attribute not a valid email"]}');
        Validation::validate($message);

    }

    public function test_validation_with_invalid_phone()
    {

        $message = ['to' => '93856', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Your activation code is 22563.'];
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('{"to":["to attribute not a valid phone number"]}');
        Validation::validate($message);
    }

    public function test_validation_with_invalid_data()
    {
        $message = ['type' => 'notify', 'message' => ''];
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('{"type":["The selected type is invalid."],"message":["The message field is required."],"to":["The to field is required."]}');
        Validation::validate($message);
    }

}
