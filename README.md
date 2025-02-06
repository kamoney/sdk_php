# Kamoney API2 SDK

How to setup ?

Add to composer.json

```text

"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/kamoney/sdk_php"
    }
],
"require": {
    "kamoney/sdk_php": "dev-main"
}

```

```bash
composer update

```



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
