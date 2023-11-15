<?php
namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use Illuminate\Http\Request;

class UpdateSupportDTO {
    public function __construct(
        public int $id,
        public string $subject,
        public string $body,
        public SupportStatus $status
    ) {}
    public static function fromRequest(Request $request): UpdateSupportDTO {
        return new self($request->id, $request->subject, $request->body, SupportStatus::ABERTO);
    }
}
