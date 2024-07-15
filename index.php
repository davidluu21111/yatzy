<?php
require 'vendor/autoload.php';
require 'src/YatzyGame.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$game = new YatzyGame();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write(file_get_contents('index.html'));
    return $response->withHeader('Content-Type', 'text/html');
});

$app->get('/leaderboard', function (Request $request, Response $response, $args) use ($game) {
    $leaderboard = $game->getLeaderboard();
    $response->getBody()->write(json_encode($leaderboard));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/score', function (Request $request, Response $response, $args) use ($game) {
    $data = $request->getParsedBody();
    $game->addScore($data['player'], $data['score']);
    $response->getBody()->write(json_encode(['status' => 'success']));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/roll', function (Request $request, Response $response, $args) use ($game) {
    $result = $game->rollDice();
    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/roll', function (Request $request, Response $response, $args) use ($game) {
    $data = $request->getParsedBody();
    $game->addRollResult($data['player'], $data['result']);
    $response->getBody()->write(json_encode(['status' => 'success']));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
