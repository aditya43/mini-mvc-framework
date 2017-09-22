<?php

namespace Adi\Controllers;

use Adi\Core\App;
use Adi\Models\Task;

class TasksController
{
    private $_task_model;

    /**
     * Initialize Task model.
     */
    public function __construct()
    {
        $this->_task_model = new Task(App::get('database'));
    }

    /**
     * Display all tasks.
     */
    public function index()
    {
        $tasks = $this->_task_model->selectAll('todos');
        return view('tasks', compact('tasks'));
    }

    /**
     * Store new task.
     */
    public function store()
    {
        $lastInsertId = $this->_task_model->store('todos', [
            'description' => $_POST['desc']
        ]);

        return redirect('tasks');
    }
}
