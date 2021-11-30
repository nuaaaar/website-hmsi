<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class OrganizationalStructureController extends Controller
{
    public function index()
    {
        $data['departments'] = Department::orderBy('index')->get();

        return view('dashboard.organizational-structure.index', $data);
    }
}
