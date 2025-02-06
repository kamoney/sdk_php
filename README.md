# Kamoney API2 SDK


```bash
composer require kamoney/sdk_php:dev-main

```

How to setup ?

```text
<?php
require __DIR__ . '/vendor/kamoney/sdk_php/src/Kamoney.php';

use sdk_php\Kamoney;

Kamoney::$public_key = '****';
Kamoney::$secret_key = '****';

$result = Kamoney::GetStatusMerchant();
var_dump($result);

?>
```
