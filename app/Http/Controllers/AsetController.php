<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AsetController extends Controller
{
    public function inbound(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'device_id' => 'required',
            'rack_id' => 'required',
            'software_id' => 'required',
        ]);

        try {
            // Logika untuk membuat nomor aset
            $lastInbound = Asset::latest('created_at')->first();
            $nextNumber = $lastInbound ? intval(substr($lastInbound->asset_number, 4)) + 1 : 1;
            $assetNumber = 'ASN-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            // Dapatkan user yang sedang login
            $user = auth()->user();

            // Berikan nilai untuk category_statuses_id dan conditions_id
            $categoryStatusId = 4; // Gantilah dengan ID kategori yang sesuai
            $conditionId = 4; // Gantilah dengan ID kondisi yang sesuai

            // Proses Inbound
            $inbound = new Asset([
                'name' => $request->name,
                'device_id' => $request->device_id,
                'rack_id' => $request->rack_id,
                'software_id' => $request->software_id,
                'category_statuses_id' => $categoryStatusId,
                'conditions_id' => $conditionId,
                'explanation' => $request->explanation,
                'create_user_id' => $user->id,
                'asset_number' => $assetNumber,
            ]);

            $inbound->save();

            // Tentukan rute pengalihan berdasarkan peran user
            $redirectRoute = ($user->role == 'staff') ? 'inbound.index' : 'approval.index';

            return redirect()->route($redirectRoute)->with('success', 'Asset successfully added');
        } catch (\Exception $e) {
            return redirect()->route('inbound.index')->with('error', 'Failed to add asset. Error:  ' . $e->getMessage());
        }
    }

    public function return(Request $request)
    {
        // Proses Return
        // ...

        return redirect('/returns')->with('success', 'Aset berhasil dikembalikan');
    }

    public function outbound(Request $request, $asset_number)
    {
        // Validasi form
        $request->validate([
            'asset_number' => 'required',
            'pic' => 'required',
            'location_id' => 'required',
        ]);

        try {
            $asset = Asset::findOrFail($asset_number);

            // Logika untuk membuat nomor STO secara otomatis
            $lastOutbound = Asset::latest('sto_number')->first();
            $nextNumber = $lastOutbound ? intval(substr($lastOutbound->sto_number, 4)) + 1 : 1;
            $stoNumber = 'STO-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            // Berikan nilai untuk category_statuses_id dan conditions_id
            $categoryStatusId = 4;
            $conditionId = 6;

            // Proses Outbound
            $asset->update([
                'sto_number' => $stoNumber,
                'category_statuses_id' => $categoryStatusId,
                'conditions_id' => $conditionId,
            ]);

            return redirect()->route('outbound.index')->with('success', 'Outbound successfully added');
        } catch (\Exception $e) {
            return redirect()->route('outbound.index')->with('error', 'Failed to add outbound. Error: ' . $e->getMessage());
        }
    }
}
