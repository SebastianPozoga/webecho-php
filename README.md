# Webecho-PHP
PHP client for webecho-service. Make possible use sockets by php. Create api to realtime communication.
Use https://github.com/SebastianPozoga/webecho-service to serve data.

#install
add to your composer.json

```
{
  //...

  "require": {
    "sebastianpozoga/webecho-php": "dev-master@dev"
  },

  //...
}
```

and install by composer install or update

```
composer install
```

# Example

## Init

```
namespace Webecho;

$config = WebechoConfig([
  'host' => 'http://loclahost:8191/'
  'token' => 'your app token'
]);

$webeacho = new Webecho($config);

```

## Send
```
$echo = $webeacho->echo();
$echo->setAction('action_name');
$echo->setData(array(
  'message' => 'example message',
  'other_data' => 'other data for action...',
));
$echo->send();
```

## Example project (Symfony2)
https://github.com/SebastianPozoga/webecho-php-example