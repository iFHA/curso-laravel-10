<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SupportService;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct(private SupportService $service) {}

    public function index(int $id) {
        if(!$support = $this->service->getById($id)) {
            return back();
        }
        return view('admin.supports.replies.index', compact('support'));
    }
}
