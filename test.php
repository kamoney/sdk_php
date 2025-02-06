<?php
require __DIR__ . '/vendor/autoload.php';

use sdk_php\Kamoney;


Kamoney::$public_key = '****';
Kamoney::$secret_key = '****';

$result = Kamoney::GetStatusMerchant();
var_dump($result);

?>