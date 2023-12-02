<?php
namespace App\Services;

use App\DTO\Supports\Replies\CreateReplyDTO;
use App\Events\SupportReplied;
use App\Repositories\Contracts\ReplySupportRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use stdClass;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class ReplySupportService {

    public function __construct(private readonly ReplySupportRepository $repository) {}
    public function getAllBySupportId(string $id): array {
        return $this->repository->getAllBySupportId($id);
    }

    public function create(CreateReplyDTO $dto): stdClass {
        $reply = $this->repository->create($dto);
        SupportReplied::dispatch($reply->support);
        return $reply;
    }

    public function delete(string $id): bool {
        $reply = $this->repository->getById($id);
        if(!$reply) {
            throw new NotFoundResourceException("Resposta '$id' não encontrada");
        }
        if(Gate::denies('owner', $reply->user['id'])) {
            abort(403, 'Não Autorizado');
        }
        return $this->repository->delete($id);
    }
}
