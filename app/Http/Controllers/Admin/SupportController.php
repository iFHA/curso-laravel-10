<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index() {
        $supports = Support::all();
        return view('admin.supports.index', compact('supports'));
    }
    public function create() {
        return view('admin.supports.create');
    }
    public function store(StoreUpdateSupportRequest $request) {
        Support::create($request->all());
        return to_route('supports.index');
    }
    public function update(StoreUpdateSupportRequest $request, int $id) {
        if(!$support = Support::find($id)) {
            return back();
        }
        $support->update($request->all());
        return to_route('supports.index');
    }
    public function show(int $id) {
        if(!$support = Support::find($id)) {
            return back();
        }
        return view('admin.supports.show', compact('support'));
    }
    public function edit(int $id) {
        if(!$support = Support::find($id)) {
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }
    public function destroy(int $id) {
        if(!$support = Support::find($id)) {
            return back();
        }
        $support->delete();
        return to_route('supports.index');
    }
}
