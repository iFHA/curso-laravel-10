<?php

namespace App\Repositories\Contracts;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use stdClass;

interface SupportRepository {
    public function paginate(int $page = 1, int $perPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function getById(string $id): stdClass|null;
    public function create(CreateSupportDTO $data): stdClass;
    public function update(UpdateSupportDTO $data): stdClass|null;
    public function delete(string $id): void;
}
