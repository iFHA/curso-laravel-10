<?php
namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use Illuminate\Http\Request;

class UpdateSupportDTO {
    public function __construct(
        public string $id,
        public string $subject,
        public string $body,
        public SupportStatus $status
    ) {}
    public static function fromRequest(Request $request, string $id = null): UpdateSupportDTO {
        return new self($id ?? $request->id, $request->subject, $request->body, SupportStatus::ABERTO);
    }
}
