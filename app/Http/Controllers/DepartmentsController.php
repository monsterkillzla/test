<?php

namespace App\Http\Controllers;

use App\Http\Requests\createDepartmentRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Department;

class DepartmentsController extends Controller
{
    use ValidatesRequests;
    public function index(){
        return view('departments.index', ['departments' => Department::getDepartments()]);
    }

    public function create(){
        return view('departments.create');
    }

    public function store(createDepartmentRequest $request){
        $department = new department();
        $department->storing($request,$department);
        return redirect()->route('departments.index');
    }

    public function edit($id){
        return view('departments.edit', ['department' => Department::getDepartmentById($id)]);
    }

    public function update(createDepartmentRequest $request, $id){
        Department::updateDepartment($request,$id);
        return redirect()->route('departments.index');
    }

    public function delete($id){
        Department::deleteDepartment($id);
        return redirect()->route('departments.index');
    }
}
