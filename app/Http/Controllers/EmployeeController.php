<?php

namespace App\Http\Controllers;

use App\Connection;
use App\Http\Requests\createEmployeeRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Employee;
use App\Department;

class EmployeeController extends Controller
{
    use ValidatesRequests;
    public function index(){
        return view('employees.index', ['employees' => Employee::getEmployees(),'departments'=> Department::getDepartments(),'connections'=>Connection::getAll()]);
    }

    public function create(){
        return view('employees.create', ['deps' => Department::getDepartments()]);
    }

    public function store(createEmployeeRequest $request){
        $emp=new Employee();
        $emp->storing($request,$emp);
        return redirect()->route('employees.index');
    }

    public function edit($id){
        return view('employees.edit', ['employee' => Employee::getEmployeeById($id), 'deps' => Department::getDepartments()]);
    }

    public function update(createEmployeeRequest $request, $id){
        Employee::updateEmployee($request,$id);
        return redirect()->route('employees.index');
    }

    public function delete($id){
        Employee::deleteEmployee($id);
        return redirect()->route('employees.index');
    }
}
