<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

  public function show()
  {
    $departments = Department::All();
    return view('departments.show', ['departments' => $departments]);
  }
  public function edit($id)
  {
    $department = Department::FindOrFail($id);
    return view('departments.department-edit', ['department' => $department]);
  }
  public function store(Request $request)
  {
    $department = new Department();
    $department->name = $request->name;
    $department->floor = $request->floor;

    try {
      $department->save();
      return redirect('/departamentos')->with('success', 'Exito na requisição!');
    } catch (\Throwable $th) {
      return redirect('/departamentos')->with('error', 'Erro na requisição erro:', $th);
    }
  }

  public function update(Request $request)
  {
    $data = $request->all();
    Department::findOrFail($request->id)->update($data);
    return redirect('/departamentos')->with('success', 'Departamento editado com sucesso!');
  }
  public function destroy($id)
  {
    Department::findOrFail($id)->delete();
    return redirect('/departamentos')->with('success', 'Departamento removido com sucesso!');
  }
}