<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';      // Table name
    protected $primaryKey = 'id';         // Primary key
    protected $allowedFields = ['name', 'email', 'password']; // Columns that can be inserted/updated

    // Optional: return type
    protected $returnType = 'array';
}
