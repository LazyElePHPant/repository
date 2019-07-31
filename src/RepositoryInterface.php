<?php

namespace LazyElePHPant\Repository;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function list($orderByColumn, $orderBy = 'desc', $with = [], $columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy(string $field, mixed $value, $columns = array('*'));

    public function setModel(Model $model);

    public function getModel();
}
