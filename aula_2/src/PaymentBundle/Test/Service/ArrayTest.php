<?php

namespace PaymentBundle\Test\Service;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ArrayTest extends TestCase
{
    private $array;

    public static function setUpBeforeClass(): void
    {

    }

    #[Test]
    public function shouldBeEmpty()
    {
        $this->assertEmpty($this->array);
    }

    #[Test]
    public function shouldBeFilled()
    {
        $this->array = ['hello' => 'world'];

        $this->assertNotEmpty($this->array);
    }
}