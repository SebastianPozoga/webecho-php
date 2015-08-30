# Webecho-PHP
PHP client for webecho-service. Make possible use sockets by php. Create api to realtime communication.

#install
add to your composer.json adn install by
```
composer install
```

# Init

```
namespace Webecho;

$config = WebechoConfig([
  'host' => 'http://loclahost:8191/'
  'token' => 'your app token'
]);

$webeacho = new Webecho($config);

```

### Send 
```
$echo = $webeacho->echo();
$echo->setAction('action_name');
$echo->setData(array(
  'message' => 'example message',
  'other_data' => 'other data for action...',
));
$echo->send();
```