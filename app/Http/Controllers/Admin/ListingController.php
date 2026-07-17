<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateListingRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Location;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    use FileHandler;

    /**
     * Display a listing of the resource.
     */
    public function index(ListingDataTable $dataTable)
    {
        return $dataTable->render('dashboard.listings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->get();
        $locations = Location::active()->get();
        $amenities = Amenity::active()->get();
        return view('dashboard.listings.create', [
            'categories' => $categories,
            'locations' => $locations,
            'amenities' => $amenities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateListingRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);
        $data['image'] = $this->uploadFile($request, 'image', null, 'listings');
        $data['thumbnail_image'] = $this->uploadFile($request, 'thumbnail_image', null, 'listings');
        $data['attachments'] = $this->uploadFile($request, 'attachments', null, 'listings');


        DB::beginTransaction();
        try {

            $listing = Listing::create($data);
            $listing->amenities()->attach($data['amenities']);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return to_route('admin.listings.index')
            ->with('success', 'Listing created successfully.');
    }


//        DB::transaction(function () use ($data) {
//            $listing = Listing::create($data);
//
//            $listing->amenities()->attach($data['amenities']);
//        });


    /**
     * Display the specified resource.
     */
    public
    function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        //
    }
}
