<?php
namespace App\Repositories\Contracts;

use App\DTO\Supports\Replies\CreateReplyDTO;
use stdClass;

interface ReplySupportRepository {
    public function getAllBySupportId(string $id): array;
    public function create(CreateReplyDTO $dto): stdClass;
    public function delete(string $id): bool;
}
