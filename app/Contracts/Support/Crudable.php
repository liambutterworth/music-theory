<?php

namespace App\Contracts\Support;

interface Crudable
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
