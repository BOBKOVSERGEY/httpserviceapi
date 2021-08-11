<?php


use \PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {
    private $product;

    // запускает перед запуском теста, инициализация данных
    protected function setUp(): void
    {
        $this->product = new \App\Models\Product();
        $this->product->date = '15.08.2021 18:30:55';
    }

    public function testValidateDate()
    {
        $this->assertEquals(true, $this->product::validateDate($this->product->date));
    }

    // вызывается на исполнение после теста, можно обнулить объекты, высвободив оперативную память
    protected function tearDown(): void
    {

    }
}