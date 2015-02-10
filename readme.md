An example of PDO usage in a PHP object oriented code.

``` php
<?php

require __DIR__ . '/vendor/autoload.php';

$data = [
    'name'     => 'TestUser',
    'password' => 'TestUserPassword'
];

$service = Instances\Container::getUsersWriteService();
echo 'New user created. ID: ' . $service->createUser($data);

```
