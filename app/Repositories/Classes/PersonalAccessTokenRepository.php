<?php

declare(strict_types=1);

namespace App\Repositories\Classes;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonalAccessTokenRepository implements RepositoryInterface
{
    protected string $table = 'personal_access_tokens';

    public function insert(array $data): object
    {
        $hashedToken = hash('sha256', Str::random(40));

        return (object)DB::table($this->table)->insert([
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => $data->userId ?? 1,
            'name' => 'auth_token',
            'token' => $hashedToken,
            'abilities' => json_encode(['*']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function getOneById(int $id): object|null
    {
        return null;
    }

    public function delete(int $id): bool
    {
        return false;
    }

    public function update(int $id, array $data): bool
    {
        return false;
    }

    public function allByPaginate(int $paginate): \Illuminate\Pagination\LengthAwarePaginator
    {
        return DB::table($this->table)->paginate($paginate);
    }

    public function deleteByTokenTypeAndUserId(int $userId, ?string $tokenType = 'App\Models\User'): bool
    {
        return (bool)DB::table($this->table)
            ->where('tokenable_type', $tokenType)
            ->where('tokenable_id', $userId)
            ->delete();
    }
}
