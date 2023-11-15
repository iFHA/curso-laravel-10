<?php

namespace App\Models;

use App\Enums\SupportStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'body', 'status'];

    public function status(): Attribute {
        return Attribute::make(
            get: fn($status) => SupportStatus::tryFrom($status)->getDescription(),
            set: fn(SupportStatus $status) => $status->value
        );
    }
}
