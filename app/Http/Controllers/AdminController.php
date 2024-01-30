<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Asset;
use App\Models\User;
use App\Models\Device;
use App\Models\Location;
use App\Models\Rack;
use App\Models\Software;
use App\Models\CategoryStatus;
use App\Models\Document;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        $totalAssets = Asset::count();
        $totalInbound = Asset::whereIn('category_statuses_id', [1, 2])->count();

        return view('layouts.wellcome', compact('totalAssets', 'totalInbound'));
    }

    function admin() {
        $totalAssets = Asset::count();
        $totalInbound = Asset::whereIn('category_statuses_id', [1, 2])->count();

        return view('layouts.wellcome', compact('totalAssets', 'totalInbound'));
    }

    function staff() {
        $totalAssets = Asset::count();
        $totalInbound = Asset::whereIn('category_statuses_id', [1, 2])->count();

        return view('layouts.wellcome', compact('totalAssets', 'totalInbound'));
    }

    function supervisor() {
        $totalAssets = Asset::count();
        $totalInbound = Asset::whereIn('category_statuses_id', [1, 2])->count();

        return view('layouts.wellcome', compact('totalAssets', 'totalInbound'));
    }


    function inbound() {
        $devices = Device::all();
        $racks = Rack::all();
        $softwares = Software::all();

        return view('layouts.inbound', [
            'devices' => $devices,
            'racks' => $racks,
            'softwares' => $softwares,
        ]);
    }

    function return() {
        $racks = Rack::all();
        $statuss = CategoryStatus::all();

        return view('layouts.return', [
            'racks' => $racks,
            'statuss' => $statuss,
        ]);
    }

    function inventorys() {
        $assets = Asset::with(['device', 'rack', 'software', 'categorystatus', 'condition'])
        ->whereIn('category_statuses_id', [1, 2])
        ->get();

        // Mengirim data ke view
        return view('layouts.inventorys', compact('assets'));
    }

    function assets() {
        // Mengambil data assets dengan relasi device dan category_statuses
        $assets = Asset::with(['device', 'categorystatus'])->get();

        // Mengambil data user
        $userRole = auth()->user()->role;

        return view('layouts.assets', compact('assets', 'userRole'));
    }

    function deleteAssets() {
        // Mengambil data assets dengan relasi device dan category_statuses
        $assets = Asset::with(['device', 'categorystatus'])->get();

        // Mengambil data user
        $userRole = auth()->user()->role;

        return view('layouts.deleteAsset', compact('assets', 'userRole'));
    }

    public function destroy(Asset $asset)
    {
        try {
            $asset->delete();
            return redirect('/assets/delete')->with('success', 'Asset deleted successfully!');
        } catch (QueryException $e) {
            // Tangani kesalahan lainnya
            return redirect('/assets/delete')->with('error', 'Error deleting the Asset.');
        }
    }

    function outbound(Request $request) {
        $assets = Asset::where('category_statuses_id', [1, 2])->get();
        $locations = Location::all();
        $data = [
            ['name'=>'Outbound'],
            ['name'=>'Inbound'],
            ['name'=>'middlebound'],

        ];

        return view('layouts.outbounds', compact('locations', 'assets','data'));
    }

    function locations() {
        // Mengambil data user
        $userRole = auth()->user()->role;

        return view('layouts.locations', compact('userRole'));
    }

    function detailLocations() {
        return view('layouts.detailLocation');
    }

    function updateLocations() {
        return view('layouts.updateLocation');
    }

    function editLocations() {
        return view('layouts.editLocation');
    }


    function catalog() {
        $totalUsers = User::count();
        $totalDevices = Device::count();
        $totalLocations = Location::count();
        $totalRacks = Rack::count();
        $totalSoftwares = Software::count();

        return view('layouts.catalog', compact(
            'totalUsers',
            'totalDevices',
            'totalLocations',
            'totalRacks',
            'totalSoftwares'
        ));
    }

    function detailInformation() {
        return view('layouts.detailInformation');
    }
}
