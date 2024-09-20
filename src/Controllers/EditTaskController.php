<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class EditTaskController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        $data = $this->model->getTaskById($args['id']);

        return $this->renderer->render($response, 'edit.phtml', ['message'=>$data['message'],'id'=>$data['id']]);
    }
}