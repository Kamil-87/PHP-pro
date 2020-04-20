<?php


class GoodMilk extends Good
{
    public $date;  //дата проивзодста

    public function __construct($title, $price, $desc, $date, $id = 0)
    {
        $this->date = $date;
        parent::__construct($title, $price, $desc, $id); //любой метод
    }

    /** Вывод информации о товаре */
    public function display(): void
    {
        echo $this->getInfo() . $this->getDate() . $this->getPrice() . "<hr>";
    }

    /** возвращает дату производства товара */
    protected function getDate()
    {
        return /** @lang text */
            <<<php
        <p>Дата производства: $this->date</p>
php;
    }
}
