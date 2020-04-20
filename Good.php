<?php

/**
 * Class Good
 *
 * @property string $test
 */

class Good
{
    protected $id;
    protected $title;
    /**
     * @var Price
     */
    protected $price;
    protected $desc;

    public function __construct($title, $price, $desc, $id = 0)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->desc = $desc;
    }

    /** Вывод информации о товаре */
    public function display(): void
    {
        echo $this->getInfo() . $this->getPrice() . "<hr>";
    }

    /** возвращает основную информацию о товаре */
    protected function getInfo(): string
    {
        return /** @lang text */
        <<<php
        <p>$this->title</p>
        <p>$this->desc</p>
php;
    }

    /** возвращает стоимость товара */
    protected function getPrice(): string
    {
        return /** @lang text */
            <<<php
        <p>$this->price</p>
php;
    }

    public function __get($name)
    {
       echo '__get => ' . $name;
    }

    public function __set($name, $value)
    {
        echo '__get => ' . $name . ' ' . $value;
    }
}


