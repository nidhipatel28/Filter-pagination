<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $viewEmployees = Employee::with('salary','Designation')->paginate(2);

        return view('index')->with(['viewEmployees' => $viewEmployees]);
    }

    public function searchData(Request $request)
    {
        $search = $request->search;
        $role = $request->role;
        if($request->ajax())
        {
            $output="";
            $viewData = Employee::with('salary','Designation');

            if($role == 1){
                $viewData = $viewData->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
            }
            if($role == 3){
                $viewData = $viewData->orWhereHas('salary', function ($q) use ($search) {
                    $q->where('salary', 'LIKE', '%' . $search . '%');
                });
            }
            if($role == 2){
                $viewData = $viewData->orWhereHas('Designation', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
            }

            $viewData = $viewData->paginate(2);

            if($viewData) {
                foreach ($viewData as $key => $employee) {
                    $key +=1;
                    $output.='<tr>'.
                    '<td>'.$key.'</td>'.
                    '<td>'.$employee->name.'</td>'.
                    '<td>'.$employee->Designation->name.'</td>'.
                    '<td>'.$employee->salary->salary.'</td>'.
                    '</tr>';
                }
                return json_encode($output);
            }
        }
    }
}
