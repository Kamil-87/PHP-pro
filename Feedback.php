<?php


class Feedback
{
    public $id;
    public $user_name;
    public $user_comments;
    public $product_id;

    /** Вывод информации о товаре */
    public function display(): void
    {
        echo $this->getInfo() . "<hr>";
    }

    /** возвращает основную информацию о товаре */
    protected function getInfo(): string
    {
        return /** @lang text */
            <<<php
        <p>$this->user_name</p>
        <p>$this->user_comments</p>
php;
    }
}
