<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(private SupportService $service) {}
    public function index(Request $request) {
        $supports = $this->service->paginate(
            $request->get("page",1),
            $request->get('per_page', 10),
            $request->filter
        );
        $filters = [
            'filter' => $request->get('filter', '')
        ];
        return view('admin.supports.index', compact('supports', 'filters'));
    }
    public function create() {
        return view('admin.supports.create');
    }
    public function store(StoreUpdateSupportRequest $request) {
        $this->service->create(CreateSupportDTO::fromRequest($request));
        return to_route('supports.index')->with('message', 'Dúvida cadastrada com sucessso!');
    }
    public function update(StoreUpdateSupportRequest $request) {
        $support = $this->service->update(UpdateSupportDTO::fromRequest($request));
        if(!$support) {
            return back();
        }
        return to_route('supports.index')->with('message', 'Dúvida '.$request->id.' alterada com sucessso!');;
    }
    public function show(int $id) {
        if(!$support = $this->service->getById($id)) {
            return back();
        }
        return view('admin.supports.show', compact('support'));
    }
    public function edit(int $id) {
        if(!$support = $this->service->getById($id)) {
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }
    public function destroy(int $id) {
        $this->service->delete($id);
        return to_route('supports.index')->with('message', "Dúvida $id deletada com sucessso!");
    }
}
