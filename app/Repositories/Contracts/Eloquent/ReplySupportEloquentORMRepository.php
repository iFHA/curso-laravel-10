<?php
namespace App\Repositories\Contracts\Eloquent;

use App\DTO\Supports\Replies\CreateReplyDTO;
use App\Models\ReplySupport;
use App\Repositories\Contracts\ReplySupportRepository;
use stdClass;

class ReplySupportEloquentORMRepository implements ReplySupportRepository {
    public function __construct(private ReplySupport $model) {}
    public function getAllBySupportId(string $id): array {
        return $this->model->where('support_id', $id)->with('user')->get()->toArray();
    }

    public function create(CreateReplyDTO $dto): stdClass {
        $reply = $this->model->create((array) $dto);
        return (object) $reply->toArray();
    }

    public function delete(string $id): void {
        $this->model->destroy($id);
    }
}
