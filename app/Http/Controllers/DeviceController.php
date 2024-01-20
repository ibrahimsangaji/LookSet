<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();

        return view('catalog.device', ['devices' => $devices]);
    }

    public function create()
    {
        return view('create.createDevice');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $existingDevice = Device::where('name', $validatedData['name'])->first();

        if ($existingDevice) {
            return redirect('/catalog/device')->with('error', 'Device with the same name already exists!');
        }

        Device::create($validatedData);

        return redirect('/catalog/device')->with('success', 'Device added successfully!');
    }

    public function edit(Device $device)
    {
        return view('edit.editDevice', ['device' => $device]);
    }

    public function update(Request $request, Device $device)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'.$device->id,
        ]);

        $device->update($validatedData);

        return redirect('/catalog/device')->with('success', 'Device updated successfully!');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect('/catalog/device')->with('success', 'Device deleted successfully!');
    }
}
