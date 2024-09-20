<?php
declare(strict_types=1);

use App\Controllers\AddTaskController;
use App\Controllers\CompletedTasksController;
use App\Controllers\DeleteTaskController;
use App\Controllers\EditTaskController;
use App\Controllers\MarkTaskDoneController;
use App\Controllers\TasksController;
use App\Controllers\UpdateTaskController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', TasksController::class);
    $app->post('/add', AddTaskController::class);
    $app->post('/mark-done/{id}', MarkTaskDoneController::class);
    $app->get('/completed', CompletedTasksController::class);
    $app->post('/delete/{id}', DeleteTaskController::class);
    $app->get('/edit/{id}', EditTaskController::class);
    $app->post('/update', UpdateTaskController::class);
    // TODO: add routes for task editing
};
