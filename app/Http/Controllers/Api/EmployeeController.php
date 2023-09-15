<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeAddRequest;
use App\Http\Utils\ApiUtils;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getAllEmployees()
    {
        $employees = Employee::select('employee_id', 'name', 'email', 'position', 'salary')->get();

        if($employees != null){

            return ApiUtils::generateResponse($employees, "Data fetched", 200, null);
        }
        else{

            return ApiUtils::generateResponse(null, "Server error fetching data", 500, null);
        }
    }

    public function getEmployeeByEmail($email)
    {
        $employee = Employee::select('employee_id', 'name', 'email', 'position', 'salary')->where('email', 'LIKE', '%'.$email.'%')->get();

        if($employee != null){

            return ApiUtils::generateResponse($employee, "Data fetched", 200, null);
        }
        else{

            return ApiUtils::generateResponse(null, "Server error fetching data", 500, null);
        }
    }

    public function getEmployeesBySalaryRange($min, $max)
    {
        $employees = Employee::select('employee_id', 'name', 'email', 'position', 'salary')
        ->where('salary', '>=', $min)
        ->where('salary', '<=', $max)
        ->get();

        if($employees != null){

            return ApiUtils::generateResponse($employees, "Data fetched", 200, null);
        }
        else{

            return ApiUtils::generateResponse(null, "Server error fetching data", 500, null);
        }
    }

    public function addEmployee(EmployeeAddRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->save();

        $skills_ids = $request->skills_ids;

        if(!empty($skills_ids)){

            $employee->skills()->attach($skills_ids);
        }

        return ApiUtils::generateResponse(null, "Employee added successfully!", 200, null);
    }

    public function getEmployeeDetails(string $id)
    {

        $employee = Employee::find($id);

        if($employee != null){

            return ApiUtils::generateResponse(["employee" => $employee, "skills" => $employee->skills], "Data fetched", 200, null);
        }
        else{

            return ApiUtils::generateResponse(null, "Server error fetching data", 500, null);
        }
    }
}
