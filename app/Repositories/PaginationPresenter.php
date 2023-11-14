<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    /**
     * Itens
     *
     * @var stdClass[]
     */
    private array $items;
    public function __construct(private LengthAwarePaginator $paginator) {
        $this->items = $this->resolveItems($this->paginator->items() ?? []);
    }
    public function items(): array {
        return $this->items;
    }
    public function total(): int {
        return $this->paginator->total() ?? 0;
    }
    public function isFirstPage(): bool {
        return $this->paginator->currentPage() === 1;
    }
    public function isLastPage(): bool {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }
    public function currentPage(): int {
        return $this->paginator->currentPage() ?? 1;
    }
    public function getPreviousPageNumber(): int {
        return $this->paginator->currentPage() - 1;
    }
    public function getNextPageNumber(): int {
        return $this->paginator->currentPage() + 1;
    }
    private function resolveItems(array $items): array {
        $arrayItems = [];
        foreach($items as $item) {
            $objeto = new stdClass();
            foreach($item->toArray() as $key => $value) {
                $objeto->$key = $value;
            }
            $arrayItems[] = $objeto;
        }
        return $arrayItems;
    }
}
