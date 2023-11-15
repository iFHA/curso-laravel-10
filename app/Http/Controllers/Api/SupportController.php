<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Http\Resources\SupportResource;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportController extends Controller
{
    public function __construct(private SupportService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            $request->get("page",1),
            $request->get('per_page', 10),
            $request->filter
        );
        return ApiAdapter::toJson($supports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupportRequest $request)
    {
        $support = $this->service->create(CreateSupportDTO::fromRequest($request));
        return new SupportResource($support);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $support = $this->service->getById($id);
        if(!$support) {
            return response()->json(['error'=> 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupportRequest $request, int $id)
    {
        $support = $this->service->update(UpdateSupportDTO::fromRequest($request, $id));
        if(!$support) {
            return response()->json(['error'=> 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return new SupportResource($support);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$this->service->getById($id)) {
            return response()->json(['error'=> 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
