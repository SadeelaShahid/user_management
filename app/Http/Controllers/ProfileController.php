<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'father_name' => 'required',
            'email'       => 'required|email',
            'comment'     => 'required',
            'picture'     => 'nullable|image|max:2048',
        ]);

        $picturePath = null;
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('pictures', 'public');
        }

        Profile::create([
            'name'        => $request->name,
            'father_name' => $request->father_name,
            'email'       => $request->email,
            'comment'     => $request->comment,
            'picture'     => $picturePath,
        ]);

        return redirect()->route('profiles.index')->with('success', 'User register ho gaya!');
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name'        => 'required',
            'father_name' => 'required',
            'email'       => 'required|email',
            'comment'     => 'required',
            'picture'     => 'nullable|image|max:2048',
        ]);

        $picturePath = $profile->picture;
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('pictures', 'public');
        }

        $profile->update([
            'name'        => $request->name,
            'father_name' => $request->father_name,
            'email'       => $request->email,
            'comment'     => $request->comment,
            'picture'     => $picturePath,
        ]);

        return redirect()->route('profiles.index')->with('success', 'User update ho gaya!');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'User delete ho gaya!');
    }
}