<?php

namespace App\Services;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\SupportStatus;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SupportRepository;
use Illuminate\Support\Facades\Gate;
use stdClass;

class SupportService {

    public function __construct(private SupportRepository $repository) {}
    public function getAll(string $filter = null): array {
        return $this->repository->getAll($filter);
    }
    public function paginate(int $page = 1, int $perPage = 15, string $filter = null): PaginationInterface {
        return $this->repository->paginate($page, $perPage, $filter);
    }
    public function getById(string $id): stdClass|null {
        return $this->repository->getById($id);
    }
    public function create(CreateSupportDTO $dto): stdClass {
        return $this->repository->create($dto);
    }
    public function update(UpdateSupportDTO $dto): stdClass|null {
        if(Gate::denies('owner', $dto->id)) {
            abort(403, 'Não Autorizado');
        }
        return $this->repository->update($dto);
    }
    public function updateStatus(string $id, SupportStatus $status) {
        $this->repository->updateStatus($id, $status);
    }
    public function delete(string $id): void {
        if(Gate::denies('owner', $id)) {
            abort(403, 'Não Autorizado');
        }
        $this->repository->delete($id);
    }
}
