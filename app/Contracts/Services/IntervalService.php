<?php

namespace App\Contracts\Services;

use App\Contracts\Support\Crudable;
use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Models\Interval;
use Illuminate\Pagination\LengthAwarePaginator;

interface IntervalService extends Crudable
{
    public function all(): IntervalCollection;
    public function paginate(): LengthAwarePaginator;
    public function find(int $id): Interval;
    public function create(array $data): Interval;
    public function update(int $id, array $data): Interval;
    public function delete(int $id): Interval;
}
