<?php

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    $response->getBody()->write('Welcome to Slim!');
    return $response;
});

//добавление новых маршрутов
//GET /users и POST /users
//разные маршруты со своими обработчиками.
// $app->get('/users', function ($request, $response) {
//     return $response->write('GET /users');
// });

$app->post('/users', function ($request, $response) {
    return $response->write('POST /users');
});

//Редирект
// $app->post('/users', function ($request, $response) {
//     return $response->withStatus(302);
// });

$app->get('/courses/{id}', function ($request, $response, array $args) {
    $id = $args['id'];
    return $response->write("Course id: {$id}");
});

$app->run();
