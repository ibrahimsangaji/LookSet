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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        return view('layouts/wellcome');
    }

    function admin() {
        return view('layouts/wellcome');
    }

    function staff() {
        return view('layouts/wellcome');
    }

    function supervisor() {
        return view('layouts/wellcome');
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
        // Mengambil data dengan join antara tabel documents dan assets
        $documents = Document::join('assets', 'documents.asset_number', '=', 'assets.asset_number')
        ->join('devices', 'assets.device_id', '=', 'devices.id')
        ->join('racks', 'assets.rack_id', '=', 'racks.id')
        ->join('category_statuses', 'assets.category_statuses_id', '=', 'category_statuses.id')
        ->select('documents.*', 'devices.name as device_name', 'racks.explanation as rack_explanation', 'category_statuses.category as category')
        ->whereIn('documents.category_statuses_id', [1, 2])
        ->get();

        // Mengirim data ke view
        return view('layouts.inventorys', compact('documents'));
    }

    function assets() {
        // Mengambil data assets dengan relasi device dan category_statuses
        $assets = Asset::with(['device', 'categorystatus'])->get();

        // Mengambil data user
        $userRole = auth()->user()->role;

        return view('layouts/assets', compact('assets'));
    }

    function updateAssets() {
        return view('layouts.updateAsset');
    }

    function outbound() {
        $locations = Location::all();

        return view('layouts.outbounds', compact('locations'));
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
}
