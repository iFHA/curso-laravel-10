<?php

namespace App\Repositories\Contracts\Eloquent;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SupportRepository;
use App\Repositories\PaginationPresenter;
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
    public function getById(string $id): stdClass|null {
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
    public function delete(string $id): void {
        $this->model->findOrFail($id)->delete();
    }

    public function paginate(int $page = 1, int $perPage = 15, $filter = null): PaginationInterface {
        $result = $this->model
                    ->where(function($query) use ($filter) {
                        if($filter) {
                            $query->where('subject', 'like','%'. $filter .'%');
                            $query->orWhere('body', 'like','%'. $filter .'%');
                        }
                    })
                    ->paginate($perPage, ['*'], 'page', $page);
        return new PaginationPresenter($result);
    }
}
