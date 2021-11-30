<?php

namespace App\Http\Controllers;

use App\Department;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function create()
    {
        if (!isset($_GET['department_id'])) {
            return abort(404);
        }
        $data['department'] = Department::findOrFail($_GET['department_id']);

        return view('dashboard.member.create', $data);
    }

    public function store(Request $request)
    {
        $imagePath = '/app-assets/images/icon/image.png';
        if ($request->hasFile('image'))
        {
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $imagePath = '/storage/' . $request->file('image')->storeAs('images', $fileName, 'public');
        }
        Member::create([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'position' => $request->position,
            'index' => $request->index,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil ditambah.');
    }

    public function edit($id)
    {
        $data['member'] = Member::with('department')->where('id', $id)->first();

        return view('dashboard.member.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $imagePath = $member->image;
        if ($request->hasFile('image'))
        {
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $imagePath = '/storage/' . $request->file('image')->storeAs('images', $fileName, 'public');
        }
        $member->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'position' => $request->position,
            'index' => $request->index,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus.');
    }
}
