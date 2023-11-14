<?php
namespace App\DTO;

use Illuminate\Http\Request;

class CreateSupportDTO {
    public function __construct(
        public string $subject,
        public string $body,
        public string $status
    ) {}
    public static function fromRequest(Request $request): CreateSupportDTO {
        return new self($request->subject, $request->body, 'a');
    }
}
