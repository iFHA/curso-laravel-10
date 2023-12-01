<?php
namespace App\Services;

use App\DTO\Supports\Replies\CreateReplyDTO;
use App\Repositories\Contracts\ReplySupportRepository;
use stdClass;

class ReplySupportService {

    public function __construct(private readonly ReplySupportRepository $repository) {}
    public function getAllBySupportId(string $id): array {
        return $this->repository->getAllBySupportId($id);
    }

    public function create(CreateReplyDTO $dto): stdClass {
        return $this->repository->create($dto);
    }

    public function delete(string $id): bool {
        return $this->repository->delete($id);
    }
}
