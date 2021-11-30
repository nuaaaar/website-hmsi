<?php

namespace App\Http\Controllers;

use App\About;
use App\Department;
use App\Post;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function home()
    {
        $data['title'] = 'Beranda';
        $data['about'] = About::first();
        $data['posts'] = Post::orderByDesc('updated_at')->take(14)->get();

        return view('landingpage.home.index', $data);
    }

    public function organizationalStructure()
    {
        $data['title'] = 'Struktur Organisasi';
        $data['departments'] = Department::whereHas('members')->with('members')->orderBy('index')->get();

        return view('landingpage.organizational-structure.index', $data);
    }
}
