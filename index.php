<?php

require_once ("Good.php");
require_once ("Price.php");
require_once ("GoodMilk.php");
require_once ("DiscountPrice.php");

$price = new Price(321, "USD");
$price->display();

$priceGood = new DiscountPrice(20, 100 );
$priceGood->display();
