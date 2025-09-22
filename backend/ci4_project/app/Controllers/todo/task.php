<?php

namespace App\Controllers\Todo;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TaskModel;

class Task extends ResourceController
{
    protected $modelName = TaskModel::class;
    protected $format    = 'json';

    /** GET /todo/tasks */
    public function index()
    {
        $tasks = $this->model->findAll();
        return $this->respond($tasks);
    }

    /** GET /todo/tasks/{id} */
    public function show($id = null)
    {
        $task = $this->model->find($id);
        if ($task) {
            return $this->respond($task);
        }
        return $this->failNotFound('Task not found');
    }

    /** POST /todo/tasks */
    public function create()
    {
        $data = $this->request->getJSON(true);

        // Defaults if missing
        $data['status'] = $data['status'] ?? 'Pending';
        $data['assignedDate'] = $data['assignedDate'] ?? date('Y-m-d H:i:s');
        $data['completedDate'] = $data['completedDate'] ?? null;

        $id = $this->model->insert($data);
        if ($id) {
            $task = $this->model->find($id);
            return $this->respondCreated($task);
        }
        return $this->fail('Failed to create task');
    }

    /** PUT /todo/tasks/{id} */
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if ($this->model->update($id, $data)) {
            $task = $this->model->find($id);
            return $this->respond($task);
        }
        return $this->fail('Failed to update task');
    }

    /** DELETE /todo/tasks/{id} */
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id]);
        }
        return $this->failNotFound('Task not found');
    }
}
