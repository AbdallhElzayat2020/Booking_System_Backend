<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Package\PackageFeature\StorePackageFeatureRequest;
use App\Http\Requests\Admin\Package\PackageFeature\UpdatePackageFeatureRequest;
use App\Models\Package;
use App\Models\PackageFeature;
use Illuminate\Http\Request;

class PackageFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = PackageFeature::with('package')->latest()->paginate(10);
        return view('dashboard.package.package-features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::active()->get();
        return view('dashboard.package.package-features.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageFeatureRequest $request)
    {
        PackageFeature::create($request->validated());
        return redirect()->route('admin.package-features.index')
            ->with('success', 'Package feature created successfully.');
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
    public function edit(PackageFeature $packageFeature)
    {
        $packages = Package::active()->get();
        return view('dashboard.package.package-features.edit',
            compact('packageFeature', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageFeatureRequest $request, string $id)
    {
        $feature = PackageFeature::findOrFail($id);
        $feature->update($request->validated());
        return redirect()->route('admin.package-features.index')
            ->with('success', 'Package feature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feature = PackageFeature::findOrFail($id);
        $feature->delete();
        return redirect()->route('admin.package-features.index')
            ->with('success', 'Package feature deleted successfully.');
    }

    public function packageFeatures(Package $package)
    {
        $features = $package->features()->latest()->paginate(10);
        return view('dashboard.package.package-features.features', compact('features', 'package'));
    }

    public function createForPackage(Package $package)
    {
        return view('dashboard.package.package-features.create', [
            'packages' => Package::active()->get(),
//            'selectedPackageId' => $package->id
        ]);
    }
}
