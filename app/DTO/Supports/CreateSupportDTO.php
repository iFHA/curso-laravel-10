<?php
namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use Illuminate\Http\Request;

class CreateSupportDTO {
    public function __construct(
        public string $subject,
        public string $body,
        public SupportStatus $status
    ) {}
    public static function fromRequest(Request $request): CreateSupportDTO {
        return new self($request->subject, $request->body, SupportStatus::ABERTO);
    }
}
