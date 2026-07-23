<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Schedule\StoreListingScheduleRequest;
use App\Http\Requests\Admin\Schedule\UpdateListingScheduleRequest;
use App\Models\Listing;
use App\Models\ListingSchedule;
use Illuminate\Http\Request;

class ListingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListingScheduleDataTable $dataTable, Listing $listing)
    {
        return $dataTable->render('dashboard.listings.listing-schedule.index', compact('listing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Listing $listing)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('dashboard.listings.listing-schedule.create', [
            'listing' => $listing,
            'days' => $days
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingScheduleRequest $request, Listing $listing)
    {
        try {
            $data = $request->validated();

            $exists = ListingSchedule::hasActiveSchedule($listing->id, $data['day']);

            if ($exists) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'An active schedule already exists for ' . $data['day'] . '. Please deactivate the existing schedule first.');
            }

            $listing->schedules()->create($data);

            return redirect()
                ->route('admin.listings.schedules.index', $listing->id)
                ->with('success', 'Schedule added successfully.');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing, ListingSchedule $schedule)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('dashboard.listings.listing-schedule.edit', [
            'days' => $days,
            'listing' => $listing,
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingScheduleRequest $request, Listing $listing, ListingSchedule $schedule)
    {
        try {
            $data = $request->validated();


            if ($data['status'] === 'active') {
                $exists = ListingSchedule::hasActiveSchedule($listing->id, $data['day'], $schedule->id);

                if ($exists) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'An active schedule already exists for ' . $data['day'] . '. Please deactivate the existing schedule first.');
                }
            }

            $schedule->update($data);

            return redirect()
                ->route('admin.listings.schedules.index', $listing->id)
                ->with('success', 'Schedule updated successfully.');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
