<?php

namespace App\Models;

use App\Enums\SupportStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['subject', 'body', 'status'];
    protected $appends = ['statusDescription'];
    public function status(): Attribute {
        return Attribute::make(
            set: fn(SupportStatus $status) => $status->value
        );
    }
    public function getStatusDescriptionAttribute(): string {
        return SupportStatus::tryFrom($this->status)->getDescription();
    }
}
