<?php

declare(strict_types=1);

namespace App\Repositories\Classes;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class UserRepository implements RepositoryInterface
{
    protected string $table = 'users';

    public function insert(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        $id = DB::table($this->table)->insertGetId($data);
        $data['id'] = $id;

        return $data;
    }

    public function getOneById(int $id): object|null
    {
        return DB::table($this->table)->find($id) ?? null;
    }

    public function delete(int $id): bool
    {
        return (bool)DB::table($this->table)->delete($id);
    }

    public function update(int $id, array $data): bool
    {
        return (bool)DB::table($this->table)->update($data);
    }

    public function allByPaginate(int $paginate): \Illuminate\Pagination\LengthAwarePaginator
    {
        return DB::table($this->table)
            ->orderBy('id', 'desc')
            ->paginate($paginate);
    }

    public function getOneByColumn($column, $value): object|null
    {
        return DB::table($this->table)
            ->where($column, $value)
            ->firstOrFail();
    }
}
