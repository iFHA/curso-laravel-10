<?php
namespace App\DTO\Supports\Replies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateReplyDTO {

    public readonly string $user_id;
    public function __construct(
        public readonly string $content,
        public readonly string $support_id
    ) {
        $this->user_id = Auth::user()->id;
    }
    public static function fromRequest(Request $request): CreateReplyDTO {
        return new self($request->content, $request->support_id);
    }
}
