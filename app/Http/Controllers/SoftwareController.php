<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function index()
    {
        $softwares = Software::all();

        return view('catalog.software', ['softwares' => $softwares]);
    }

    public function create()
    {
        return view('create.createSoftware');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'information' => 'required|string|max:255',
        ]);

        $existingSoftware = Software::where('name', $validatedData['name'])->first();

        if ($existingSoftware) {
            return redirect('/catalog/software')->with('error', 'Software with the same name already exists!');
        }

        Software::create($validatedData);

        return redirect('/catalog/software')->with('success', 'Software added successfully!');
    }

    public function edit(Software $software)
    {
        return view('edit.editSoftware', ['software' => $software]);
    }

    public function update(Request $request, Software $software)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'.$software->id,
            'information' => 'nullable|string|max:255',
        ]);

        $software->update($validatedData);

        return redirect('/catalog/software')->with('success', 'Software updated successfully!');
    }

    public function destroy(Software $software)
    {
        $software->delete();
        return redirect('/catalog/software')->with('success', 'Software deleted successfully!');
    }
}
