<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Connection;

class Employee extends Model
{
    protected $fillable = ['name','surname','patronymic','gender','salary'];

    public function storing($request,$employee){
        $employee->fill($request->all());
        $employee->save();
        foreach ($request->input('department') as $dep){
            $dep_id = DB::table('departments')->where('name', $dep)->first()->id;
            $conn = new Connection();
            $conn->fill(array(
                'departmentId' => $dep_id,
                'employeeId' => $employee['id']
            ));
            $conn->save();
            $department = Department::find($dep_id);
            $emp_count = DB::table('departments')->where('name', $dep)->first()->employees_count;
            $emp_count += 1;
            $max_salary=DB::table('departments')->where('name', $dep)->first()->max_salary;
            if ($request['salary']>$max_salary){
                $max_salary=(integer)$request['salary'];
            }
            $department->employees_count=$emp_count;
            $department->max_salary=$max_salary;
            $department->save();
        }
        return true;
    }

    public static function getEmployees(){
        return Employee::all();
    }

    public static function getEmployeeById($id){
        return Employee::find($id);
    }

    public static function updateEmployee($request,$id){
        $employee = Employee::getEmployeeById($id);
        $employee->fill($request->all());
        $employee->save();
        return true;
    }

    public static function deleteEmployee($id){
        Employee::getEmployeeById($id)->delete();
        return true;
    }
}
