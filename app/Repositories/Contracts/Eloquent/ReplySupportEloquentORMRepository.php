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
    public function getById(string $id): stdClass|null {
        $reply = $this->model->with('user')->find($id);
        if(!$reply) {
            return null;
        }
        return (object) $reply->toArray();
    }

    public function create(CreateReplyDTO $dto): stdClass {
        $reply = $this->model->create((array) $dto);
        $reply->load('support');
        return (object) $reply->toArray();
    }

    public function delete(string $id): bool {
        $reply = $this->model->find($id);
        if($reply) {
            $reply->delete();
            return true;
        }
        return false;
    }
}
