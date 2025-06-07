<?php

namespace OrderBundle\Test\Entity;

use OrderBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class CustomerTest extends TestCase
{
    #[DataProvider('customerAllowedDataProvider')]
    public function testIsAllowedToOrder($isActive, $isBlocked, $expectedAlloed)
    {
        $customer = new Customer(
            $isActive,
            $isBlocked,
            'Vinicius Oliveira',
            '+5511955558888'
        );

        $isAllowed = $customer->isAllowedToOrder();

        $this->assertEquals($expectedAlloed, $isAllowed);
    }

    public static function customerAllowedDataProvider()
    {
        return [
            'shouldBeAllowedWhenIsActiveAndNotBlocked' => [
                'isActive' => true,
                'isBlocked' => false,
                'expectedAllowed' => true
            ],
            'shouldNotBeAllowedWhenIsActiveButIsBlocked' => [
                'isActive' => true,
                'isBlocked' => true,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActive' => [
                'isActive' => false,
                'isBlocked' => false,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActiveAndIsBlocked' => [
                'isActive' => false,
                'isBlocked' => true,
                'expectedAllowed' => false
            ]
        ];
    }
}

