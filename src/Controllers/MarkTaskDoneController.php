<?php

namespace App\Controllers;

use App\Models\TasksModel;

class MarkTaskDoneController
{
    private TasksModel $model;

    public function __construct(TasksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke($request, $response, $args)
    {
        $this->model->markAsDone($args['id']);

        return $response->withHeader('Location', '/')->withStatus(301);
    }

}