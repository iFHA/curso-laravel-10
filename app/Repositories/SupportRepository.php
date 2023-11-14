<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

interface SupportRepository {
    public function getAll(string $filter = null): array;
    public function getById(int $id): stdClass|null;
    public function create(CreateSupportDTO $data): stdClass;
    public function update(UpdateSupportDTO $data): stdClass|null;
    public function delete(int $id): void;
}
