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
        return $this->representativeService->createRepresentative($request->validated());
    }

    public function show($id)
    {
        return $this->representativeService->getRepresentativeById($id);
    }

    public function edit($id)
    {
        return $this->representativeService->getRepresentativeById($id);
    }

    public function update(UpdateRequest $request, $id)
    {
        return $this->representativeService->updateRepresentative($id,$request->validated());
    }

    public function destroy($id)
    {
        return $this->representativeService->deleteRepresentative($id);
    }
}
