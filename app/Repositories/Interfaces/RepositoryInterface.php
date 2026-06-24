<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    public function insert(array $data): array;

    public function getOneById(int $id): object|null;

    public function delete(int $id): bool;

    public function update(int $id, array $data): bool;

    public function allByPaginate(int $paginate): \Illuminate\Pagination\LengthAwarePaginator;

    public function getOneByColumn($column, $value): object|null;
}
