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
            $nomorAset = 'ASN-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

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
                'asset_number' => $nomorAset,
            ]);

            $inbound->save();

            // Tentukan rute pengalihan berdasarkan peran user
            $redirectRoute = ($user->role == 'staff') ? 'documents.index' : 'approval.index';

            return redirect()->route($redirectRoute)->with('success', 'Aset berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('inbound.index')->with('error', 'Gagal menambahkan aset. Error: ' . $e->getMessage());
        }
    }

    public function return(Request $request)
    {
        // Proses Return
        // ...

        return redirect('/returns')->with('success', 'Aset berhasil dikembalikan');
    }

    public function outbound(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'device_id' => 'required',
            'rack_id' => 'required',
            'software_id' => 'required',
            'pic' => 'required',
            'location_id' => 'required',
        ]);

        try {
            // Logika untuk membuat nomor STO secara otomatis
            $lastOutbound = Asset::where('approval_status', 'approved')->latest('created_at')->first();
            $nextNumber = $lastOutbound ? intval(substr($lastOutbound->sto_number, 4)) + 1 : 1;
            $stoNumber = 'STO-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            // Dapatkan user yang sedang login
            $user = auth()->user();

            // Berikan nilai untuk category_statuses_id dan conditions_id (sesuaikan sesuai kebutuhan)
            $categoryStatusId = 3; // Gantilah dengan ID kategori yang sesuai
            $conditionId = 6; // Gantilah dengan ID kondisi yang sesuai

            // Proses Outbound
            $outbound = new Asset([
                'rack_id' => $request->rack_id,
                'software_id' => $request->software_id,
                'category_statuses_id' => $categoryStatusId,
                'conditions_id' => $conditionId,
                'explanation' => $request->explanation,
                'create_user_id' => $user->id,
                'sto_number' => $stoNumber, // Tambahkan kolom untuk menyimpan STO Number
            ]);

            $outbound->save();

            // Jika Anda perlu menambahkan entri ke tabel documents, lakukan di sini
            // Contoh:
            // $document = new Document([
            //     'document_number' => '...', // Atur sesuai kebutuhan
            //     'asset_number' => $outbound->asset_number,
            //     'name' => $outbound->name,
            //     'device_id' => $outbound->device_id,
            //     'software_id' => $outbound->software_id,
            //     'category_statuses_id' => $outbound->category_statuses_id,
            //     'conditions_id' => $outbound->conditions_id,
            //     'create_user_id' => $outbound->create_user_id,
            //     'approval_user_id' => $outbound->approval_user_id,
            //     'explanation' => $outbound->explanation,
            // ]);

            // $document->save();

            return redirect()->route('outbound.index')->with('success', 'Outbound successfully added');
        } catch (\Exception $e) {
            return redirect()->route('outbound.index')->with('error', 'Failed to add outbound. Error: ' . $e->getMessage());
        }
    }
}
