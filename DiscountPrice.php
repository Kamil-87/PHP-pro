<?php


class DiscountPrice extends Price
{
    public $discount;

    public function __construct($discount, $price, $currency="RUB")
    {
        $this->discount = $discount;
        parent::__construct($price, $currency);
    }

    /** Вывод информации о товаре */
    public function display(): void
    {
        echo $this->discount . " " . $this->chosenCurrency() . "<br>";
    }
}
