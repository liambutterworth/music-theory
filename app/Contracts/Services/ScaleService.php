<?php

namespace App\Contracts\Services;

use App\Contracts\Support\Crudable;
use App\Domain\Theory\Collections\ScaleCollection;
use App\Domain\Theory\Models\Scale;
use Illuminate\Pagination\LengthAwarePaginator;

interface ScaleService extends Crudable
{
    public function all(): ScaleCollection;
    public function paginate(): LengthAwarePaginator;
    public function find(int $id): Scale;
    public function create(array $data): Scale;
    public function update(int $id, array $data): Scale;
    public function delete(int $id): Scale;
}
