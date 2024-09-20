<?php

namespace App\Controllers;

use App\Models\TasksModel;

class AddTaskController
{
    private TasksModel $model;

    public function __construct(TasksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke($request, $response)
    {
        $data = $request->getParsedBody();

        $this->model->addTask($data['description']);

        return $response->withHeader('Location', '/')->withStatus(301);
    }
}