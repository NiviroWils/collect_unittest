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
    }

    // Тестирование метода except()
    public function testExceptMethod()
    {
        $collect = new Collect($this->testArray);
        $filtered = $collect->except('b')->toArray();
        $expectedArray = ['a' => 1, 'c' => 3];

        $this->assertEquals($expectedArray, $filtered);
    }

    // Тестирование метода only()
    public function testOnlyMethod()
    {
        $collect = new Collect($this->testArray);
        $filtered = $collect->only('a', 'b')->toArray();
        $expectedArray = ['a' => 1, 'b' => 2];

        $this->assertEquals($expectedArray, $filtered);
    }

    // Тестирование метода first()
    public function testFirstMethod()
    {
        $collect = new Collect($this->testArray);
        $first = $collect->first();

        $this->assertEquals(1, $first);
    }

    // Тестирование метода count()
    public function testCountMethod()
    {
        $collect = new Collect($this->testArray);
        $count = $collect->count();

        $this->assertEquals(3, $count);
    }

    // Тестирование метода toArray()
    public function testToArrayMethod()
    {
        $collect = new Collect($this->testArray);
        $toArray = $collect->toArray();

        $this->assertEquals($this->testArray, $toArray);
    }

    // Тестирование методов push(), unshift(), shift(), pop(), splice()
    public function testManipulationMethods()
    {
        $collect = new Collect($this->testArray);

        // push()
        $collect->push(4);
        $this->assertEquals([1, 2, 3, 4], $collect->toArray());

        // unshift()
        $collect->unshift(0);
        $this->assertEquals([0, 1, 2, 3, 4], $collect->toArray());

        // shift()
        $collect->shift();
        $this->assertEquals([1, 2, 3, 4], $collect->toArray());

        // pop()
        $collect->pop();
        $this->assertEquals([1, 2, 3], $collect->toArray());

        // splice()
        $collect->splice(1, 1);
        $this->assertEquals([1, 3], $collect->toArray());
    }
}

