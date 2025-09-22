<?php namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'todotask';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'task', 'taskType', 'assignee', 'status', 'assignedDate', 'completedDate'
    ];
}
