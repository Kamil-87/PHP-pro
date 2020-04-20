<?php


class Price
{
    public $price;
    public $currency;

    public function __construct($price, $currency="RUB")
    {
        $this->price = $price;
        $this->currency = $currency;
    }

    /** Вывод информации о товаре */
    public function display(): void
    {
        echo $this->price . " " . $this->chosenCurrency() . "<br>";
    }

    public function chosenCurrency(): string
    {
        switch ($this->currency) {
            case 'RUB':
                return "рублей";
            case 'USD':
                return "долларов";
            case 'EUR':
                return "евро";
        }
    }
}

