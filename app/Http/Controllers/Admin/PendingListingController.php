<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PendingListingDataTable;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class PendingListingController extends Controller
{
    public function index(PendingListingDataTable $dataTable)
    {
        return $dataTable->render('dashboard.pending-listing.index');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:listings,id'],
            'value' => ['required', 'in:yes,no'],
        ]);

        try {
            $listing = Listing::findOrFail($request->id);
            $listing->update([
                'is_approved' => $request->value,
            ]);

            return response([
                'status' => 'success',
                'message' => 'updated successfully.',
            ], 200);

        } catch (\Exception $exception) {
            return response([

                'status' => 'error',
                'message' => $exception->getMessage(),

            ], 500);
        }

    }
}
