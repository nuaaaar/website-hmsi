<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return abort(404);
    }

    public function create()
    {
        return view('dashboard.department.create');
    }

    public function store(Request $request)
    {
        Department::create([
            'name' => $request->name,
            'description' => $request->description,
            'index' => $request->index,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil ditambah.');
    }

    public function show($id)
    {
        $data['department'] = Department::with('members')->where('id', $id)->first();
        if ($data['department'] == null) {
            abort(404);
        }

        return view('dashboard.department.show', $data);
    }

    public function edit($id)
    {
        $data['department'] = Department::findOrFail($id);

        return view('dashboard.department.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update([
            'name' => $request->name,
            'description' => $request->description,
            'index' => $request->index,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus.');
    }
}
