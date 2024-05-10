<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    protected $testArray;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testArray = ['a' => 1, 'b' => 2, 'c' => 3];
    }

    // Тестирование методов keys() и values()
    public function testKeysAndValuesMethods()
    {
        $collect = new Collect($this->testArray);
        $keys = $collect->keys()->toArray();
        $values = $collect->values()->toArray();

        $this->assertEquals(['a', 'b', 'c'], $keys);
        $this->assertEquals([1, 2, 3], $values);
    }

    // Тестирование метода get()
    public function testGetMethod()
    {
        $collect = new Collect($this->testArray);
        $value = $collect->get('b');

        $this->assertEquals(2, $value);
    }}


