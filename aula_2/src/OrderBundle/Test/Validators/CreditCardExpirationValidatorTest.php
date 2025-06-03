<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\CreditCardExpirationValidator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class CreditCardExpirationValidatorTest extends TestCase
{
    #[DataProvider('valueProvider')]
    public function testIsValid($value, $expectedResult)
    {
        $creditCardExpirationDate = new \DateTime($value);
        $creditCardExpirationValidator = new CreditCardExpirationValidator($creditCardExpirationDate);

        $isValid = $creditCardExpirationValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public static function valueProvider()
    {
        return [
            'shouldBeValidWhenDateIsNotExpired' => ['value' => '2040-01-01', 'expectedResult' => true],
            'shouldNotBeValidWhenDateIsExpired' => ['value' => '2005-01-01', 'expectedResult' => false],
        ];
    }
}