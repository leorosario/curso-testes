<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NumericValidator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class NumericValidatorTest extends TestCase
{
    #[DataProvider('valueProvider')]
    public function testIsValid($value, $expectedResult)
    {
        $numericValidator = new NumericValidator($value);

        $isValid = $numericValidator->isValid();

        $this->assertSame($expectedResult, $isValid);
    }

    public static function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsANumber' => [20, true],
            'shouldBeValidWhenValueIsANumericString' => ['20', true],
            'shouldNotBeValidWhenValueIsNotANumber' => ['bla', false],
            'shouldNotBeValidWhenValueIsEmpty' => ['', false],
        ];
    }
}