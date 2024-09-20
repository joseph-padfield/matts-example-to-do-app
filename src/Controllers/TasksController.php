<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class TasksController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response)
    {
        $data = $this->model->getUncompletedTasks();

        return $this->renderer->render($response, 'tasks.phtml', ['results'=>$data]);
    }
}