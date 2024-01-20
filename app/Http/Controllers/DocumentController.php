<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function createDocumentsFromApprovedAssets()
    {
        try {
            // Mendapatkan asset terbaru yang telah disetujui
            $latestApprovedAsset = Asset::where('approval_status', 'approved')->orderBy('updated_at', 'desc')->first();

            // Menyiapkan array untuk menyimpan data dokumen
            $documentsData = [];

            // Jika ada asset yang telah disetujui
            if ($latestApprovedAsset) {
                // Mendapatkan nomor dokumen terakhir yang dibuat
                $lastDocumentNumber = Document::whereNotNull('asset_number')->latest('document_number')->first();
                $nextNumber = $lastDocumentNumber ? intval(substr($lastDocumentNumber->document_number, 6)) + 1 : 1;

                // Membuat document_number secara otomatis
                $documentNumber = 'DocN-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

                // Memeriksa apakah dokumen dengan nomor yang sama sudah ada
                $existingDocument = Document::where('document_number', $documentNumber)->first();

                // Jika dokumen belum ada, maka buat dokumen baru
                if (!$existingDocument) {
                    $document = new Document([
                        'document_number' => $documentNumber,
                        'asset_number' => $latestApprovedAsset->asset_number,
                        'name' => $latestApprovedAsset->name,
                        'device_id' => $latestApprovedAsset->device_id,
                        'software_id' => $latestApprovedAsset->software_id,
                        'category_statuses_id' => $latestApprovedAsset->category_statuses_id,
                        'conditions_id' => $latestApprovedAsset->conditions_id,
                        'create_user_id' => $latestApprovedAsset->create_user_id,
                        'approval_user_id' => $latestApprovedAsset->approval_user_id,
                        'explanation' => $latestApprovedAsset->explanation,
                    ]);

                    $document->save();

                    $documentsData[] = [
                        'document_number' => $documentNumber,
                        'asset_number' => $latestApprovedAsset->asset_number,
                        'category' => $latestApprovedAsset->category_statuses->name,
                        'explanation' => $latestApprovedAsset->explanation,
                    ];

                    // Increment nomor untuk dokumen selanjutnya
                    $nextNumber++;

                    // Dapatkan user yang sedang login
                    $user = auth()->user();

                    // Tentukan rute pengalihan berdasarkan peran user
                    $redirectRoute = ($user->role == 'admin') ? 'documents.index' : 'approval.index';

                    return redirect()->route($redirectRoute)->with('success', 'Document created successfully');
                }
            }

            // Jika tidak ada asset yang telah disetujui
            return redirect()->route('approval.index')->with('error', 'No approved assets found');
        } catch (\Exception $e) {
            return redirect()->route('approval.index')->with('error', 'Failed to create document. Error: ' . $e->getMessage());
        }
    }

    public function showDocuments()
    {
        // Ambil data dokumen dari database
        $documents = Document::all();

        return view('layouts.documents', compact('documents'));
    }
}
