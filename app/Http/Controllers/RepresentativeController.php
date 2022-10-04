<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Services\RepresentativeService;

class RepresentativeController extends Controller
{
    private RepresentativeService $representativeService;

    public function __construct(
        RepresentativeService $representativeService
    ) {
        $this->representativeService = $representativeService;
    }

    public function index()
    {
        $representatives = $this->representativeService->getAllRepresentatives();
        return view('representatives.index',compact('representatives'));
    }

    public function create()
    {
        return view('representatives.create');
    }

    public function store(CreateRequest $request)
    {
        $this->representativeService->createRepresentative($request->validated());
        return redirect()->route('representatives.index')
            ->with('success','Representative created successfully.');
    }

    public function show($id)
    {
        return $this->representativeService->getRepresentativeById($id);
    }

    public function edit($id)
    {
        $representative = $this->representativeService->getRepresentativeById($id);
        return view('representatives.edit',compact('representative'));

    }

    public function update(UpdateRequest $request, $id)
    {
        $this->representativeService->updateRepresentative($id,$request->validated());
        return redirect()->route('representatives.index')
            ->with('success','Representative updated successfully.');
    }

    public function destroy($id)
    {
        $this->representativeService->deleteRepresentative($id);
        return redirect()->route('representatives.index')
            ->with('success','Representative deleted successfully.');
    }
}
