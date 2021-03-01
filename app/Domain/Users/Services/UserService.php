<?php

namespace App\Domain\Users\Services;

use App\Contracts\Support\Crudable;
use App\Domain\Concerns\QueriesModel;
use App\Domain\Concerns\ValidatesData;
use App\Domain\Users\Models\User;

class UserService implements Crudable
{
    use QueriesModel, ValidatesData;

    public function model()
    {
        return User::class;
    }

    public function create(array $data)
    {
        //
    }

    public function update(int $id, array $data)
    {
        //
    }

    public function delete(int $id)
    {
        
    }
}
