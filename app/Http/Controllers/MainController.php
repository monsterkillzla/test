<?php

namespace App\Http\Controllers;

use App\Connection;
use App\Department;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $dep = Department::all();
        $connection = new Connection();
        $connection = $connection->getAll();
        return view('main.index', ['result'=>$connection,'dep'=>$dep]);
    }
}
