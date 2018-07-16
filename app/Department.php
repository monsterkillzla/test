<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public static function getDepartments(){
        return Department::all();
    }

    public function storing($request,$department){
        $department->fill($request->all());
        $department->save();
        return true;
    }

    public static function getDepartmentById($id){
        return Department::find($id);
    }

    public static function updateDepartment($request,$id){
        $department = Department::getDepartmentById($id);
        $department->fill($request->all());
        $department->save();
        return true;
    }

    public static function deleteDepartment($id){
        $department = Department::getDepartmentById($id);
        if($department->employees_count==0){
            $department->delete();
            return true;
        }
    }
}
