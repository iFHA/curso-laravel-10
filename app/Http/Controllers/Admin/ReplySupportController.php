<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;
use stdClass;

class ReplySupportController extends Controller
{
    public function __construct(
        private SupportService $supportService,
        private ReplySupportService $replySupportService
    ) {}

    public function index(string $id) {
        if(!$support = $this->supportService->getById($id)) {
            return back();
        }
        $replies = $this->replySupportService->getAllBySupportId($id);
        return view('admin.supports.replies.index', compact('support', 'replies'));
    }

    public function store(StoreReplySupportRequest $request) {
        $this->replySupportService->create(CreateReplyDTO::fromRequest($request));
        return to_route('replies.index', $request->id)->with('message', 'Resposta inserida com sucesso!');
    }

    public function destroy(string $id, string $replyId) {
        $this->replySupportService->delete($replyId);
        return to_route('replies.index', $id)->with('message', "Resposta de id $replyId removida com sucesso");
    }
}
