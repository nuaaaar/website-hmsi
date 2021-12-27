<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data['about'] = About::first();

        return view('dashboard.about.index', $data);
    }

    public function store(Request $request)
    {
        $about = About::first();

        if ($about == null) {
            About::create([
                'hmsi_profile' => $request->hmsi_profile ?? '',
                'hmsi_vision_and_mission' => $request->hmsi_vision_and_mission ?? '',
            ]);
        }else{
            $about->update([
                'hmsi_profile' => $request->hmsi_profile ?? '',
                'hmsi_vision_and_mission' => $request->hmsi_vision_and_mission ?? '',
            ]);
        }

        return redirect()->back()->with('OK', 'Data berhasil diperbarui.');
    }
}
