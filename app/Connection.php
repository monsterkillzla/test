<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Connection extends Model
{
    protected $fillable = ['departmentId','employeeId'];

    public static function getAll(){
        return $result = DB::table('connections')
            ->join('employees', 'connections.employeeId', '=', 'employees.id')
            ->join('departments', 'connections.departmentId', '=', 'departments.id')
            ->get();
    }
}
