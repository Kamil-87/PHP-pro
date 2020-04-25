<!--Создать несколько классов - наследников класса Model, используемые для сохранения данных из базы данных.-->
<!--Добавить для каждого класса неймспейс, соответствующий его месту в деректории. Каждый неймспейс должен начинаться с App-->
<!--Переписать автозагрусчик с учетом созданных пространств имен.-->


<?php
use App\services\Autoloader;

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$db = new App\services\DB();
$user = new App\models\User($db);
$product = new App\models\Product($db);
$feedback = new App\models\Feedback($db);

echo $feedback->getAll() . '<br>';
echo $user->getOne(12) . '<br>';
echo $product->getOne(1) . '<br>';




