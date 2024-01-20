<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\SoftwareController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home',function() {
    return redirect('/wellcome');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/wellcome',[AdminController::class, 'index']);
    Route::get('/logout',[SesiController::class, 'logout']);
    Route::get('/error',[SesiController::class, 'error']);

    Route::get('/wellcome/admin',[AdminController::class, 'admin'])->middleware('userAccess:admin');
    Route::get('/wellcome/staff',[AdminController::class, 'staff'])->middleware('userAccess:staff');
    Route::get('/wellcome/supervisor',[AdminController::class, 'supervisor'])->middleware('userAccess:supervisor');

    Route::get('/catalog',[AdminController::class, 'catalog']);
    // User
    Route::get('/catalog/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.delete');

    // Device
    Route::get('/catalog/device', [DeviceController::class, 'index'])->name('device.index');
    Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create');
    Route::post('/device', [DeviceController::class, 'store'])->name('device.store');
    Route::get('/devices/{device}/edit', [DeviceController::class, 'edit'])->name('device.edit');
    Route::put('/devices/{device}', [DeviceController::class, 'update'])->name('device.update');
    Route::delete('/devices/{device}', [DeviceController::class, 'destroy'])->name('device.delete');

    // Location
    Route::get('/catalog/location', [LocationController::class, 'index'])->name('location.index');
    Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('/location', [LocationController::class, 'store'])->name('location.store');
    Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/locations/{location}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('location.delete');

    // Rack
    Route::get('/catalog/rack', [RackController::class, 'index'])->name('rack.index');
    Route::get('/rack/create', [RackController::class, 'create'])->name('rack.create');
    Route::post('/rack', [RackController::class, 'store'])->name('rack.store');
    Route::get('/racks/{rack}/edit', [RackController::class, 'edit'])->name('rack.edit');
    Route::put('/racks/{rack}', [RackController::class, 'update'])->name('rack.update');
    Route::delete('/racks/{rack}', [RackController::class, 'destroy'])->name('rack.delete');

    // Software
    Route::get('/catalog/software', [SoftwareController::class, 'index'])->name('software.index');
    Route::get('/software/create', [SoftwareController::class, 'create'])->name('software.create');
    Route::post('/software', [SoftwareController::class, 'store'])->name('software.store');
    Route::get('/softwares/{software}/edit', [SoftwareController::class, 'edit'])->name('software.edit');
    Route::put('/softwares/{software}', [SoftwareController::class, 'update'])->name('software.update');
    Route::delete('/softwares/{software}', [SoftwareController::class, 'destroy'])->name('software.delete');

    Route::get('/assets',[AdminController::class, 'assets']);
    Route::get('/assets/update',[AdminController::class, 'updateAssets']);
    Route::get('/inventorys',[AdminController::class, 'inventorys']);
    Route::get('/locations',[AdminController::class, 'locations']);
    Route::get('/locations/detail',[AdminController::class, 'detailLocations']);
    Route::get('/locations/update',[AdminController::class, 'updateLocations']);

    Route::get('/inbounds', [AdminController::class, 'inbound'])->name('inbound.index');
    Route::get('/returns', [AdminController::class, 'return']);
    Route::post('/inbound', [AsetController::class, 'inbound'])->name('inbound.process');
    Route::post('/return', [AsetController::class, 'return'])->name('return.process');
    Route::get('/documents', [DocumentController::class, 'showDocuments'])->name('documents.index');
    Route::get('/create/documents', [DocumentController::class, 'createDocumentsFromApprovedAssets'])->name('documents.create');
    Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
    Route::post('/approval/{id}', [ApprovalController::class, 'processApproval'])->name('approval.process');

    Route::get('/outbounds', [AdminController::class, 'outbound'])->name('outbound.index');
    Route::post('/outbound', [AsetController::class, 'outbound'])->name('outbound.process');
});

