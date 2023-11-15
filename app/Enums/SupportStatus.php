<?php
namespace App\Enums;

enum SupportStatus: string {
    case ABERTO = 'a';
    case PENDENTE = 'p';
    case FECHADO = 'f';

    public function getDescription(): string {
        return ucfirst(strtolower($this->name));
    }
}
