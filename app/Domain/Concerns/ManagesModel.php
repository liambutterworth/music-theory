<?php

namespace App\Domain\Concerns;

trait ManagesModel
{
    abstract protected function model(): string;
    abstract protected function create(array $data);
    abstract protected function update(int $id, array $data);
    abstract protected function delete(int $id);

    public function query()
    {
        $class = $this->model();

        return $class::query();
    }

    public function all()
    {
        $class = $this->model();

        return $class::all();
    }

    public function paginate()
    {
        return $this->query()->paginate();
    }

    public function find(int $id)
    {
        return $this->query()->find($id);
    }

    public function createMany($list)
    {
        foreach ($list as $data) {
            $this->create($data);
        }
    }

    public function updateMany($list)
    {
        foreach ($list as $id => $data) {
            $this->update($id, $data);
        }
    }

    public function deleteMany($list)
    {
        foreach ($list as $id) {
            $this->delete($id);
        }
    }
}
