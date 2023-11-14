<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use stdClass;

class SupportEloquentORMRepository implements SupportRepository {
    public function __construct(private Support $model) {}

    public function getAll(string $filter = null): array {
        return $this->model
                    ->where(function($query) use ($filter) {
                        if($filter) {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like','%'. $filter .'%');
                        }
                    })
                    ->get()
                    ->toArray();
    }
    public function getById(int $id): stdClass|null {
        $support = $this->model->find($id);
        if(!$support) {
            return null;
        }
        return (object) $support->toArray();
    }
    public function create(CreateSupportDTO $data): stdClass {
        $support = $this->model->create((array) $data);
        return (object) $support->toArray();
    }
    public function update(UpdateSupportDTO $data): stdClass|null {
        $support = $this->model->find($data->id);
        if(!$support) {
            return null;
        }
        $support->update((array) $data);
        return (object) $support->toArray();
    }
    public function delete(int $id): void {
        $this->model->findOrFail($id)->delete();
    }
}