<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepository;
use stdClass;

class SupportService {

    public function __construct(private SupportRepository $repository) {}
    public function getAll(string $filter = null): array {
        return $this->repository->getAll($filter);
    }
    public function getById($id): stdClass|null {
        return $this->repository->getById($id);
    }
    public function create(CreateSupportDTO $dto): stdClass {
        return $this->repository->create($dto);
    }
    public function update(UpdateSupportDTO $dto): stdClass|null {
        return $this->repository->update($dto);
    }
    public function delete(int $id): void {
        $this->repository->delete($id);
    }
}
