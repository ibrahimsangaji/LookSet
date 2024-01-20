<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function processApproval(Request $request, $id)
    {
        try {
            // Dapatkan user yang sedang login
            $user = auth()->user();

            $asset = Asset::findOrFail($id);

            $request->validate([
                'action' => 'required|in:approved,reject',
            ]);

            // Update status persetujuan
            $asset->update([
                'approval_status' => $request->action,
                'category_statuses_id' => ($request->action == 'approved') ? $this->getCategoryStatusId($asset->conditions_id) : $asset->category_statuses_id,
                'approval_user_id' => $user->id,
            ]);

            return redirect()->route('documents.create')->with('success', 'Approval processed successfully');
        } catch (\Exception $e) {
            return redirect()->route('approval.index')->with('error', 'Gagal memproses persetujuan. Error: ' . $e->getMessage());
        }
    }

    private function getCategoryStatusId($conditionsId)
    {
        switch ($conditionsId) {
            case 4:
                return 1;
            case 5:
                return 2;
            default:
                return 1;
        }
    }

    public function index()
    {
        $approvals = Asset::where('approval_status', 'pending')->get();
        return view('layouts.approval', compact('approvals'));
    }
}
