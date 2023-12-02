<?php

namespace App\Http\Controllers\Api;

use App\DTO\Supports\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Http\Resources\ReplySupportResource;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplySupportApiController extends Controller
{
    public function __construct(
        private readonly SupportService $supportService,
        private readonly ReplySupportService $replySupportService
    ) {}

    public function index(string $supportId) {
        if(!$this->supportService->getById($supportId)) {
            return response()->json(['message'=> 'Support NOT FOUND'], Response::HTTP_NOT_FOUND);
        }

        $replies = $this->replySupportService->getAllBySupportId($supportId);
        return ReplySupportResource::collection($replies);
    }

    public function store(StoreReplySupportRequest $request) {
        $reply = $this->replySupportService->create(CreateReplyDTO::fromRequest($request));
        $resource = new ReplySupportResource((array) $reply);
        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(string $id) {
        $this->replySupportService->delete($id);
        return response(status: Response::HTTP_NO_CONTENT);
    }
}
