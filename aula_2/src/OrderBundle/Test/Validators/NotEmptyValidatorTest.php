<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NotEmptyValidator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class NotEmptyValidatorTest extends TestCase
{
    #[DataProvider('valueProvider')]
    public function testIsValid($value, $expectedResult)
    {
        $notEmptyValidator = new NotEmptyValidator($value);

        $isValid = $notEmptyValidator->isValid();

        $this->assertSame($expectedResult, $isValid);
    }

    public static function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsNotEmpty' => ['foo', true],
            'shouldNotBeValidWhenValueIsEmpty' => ['', false]
        ];
    }
}