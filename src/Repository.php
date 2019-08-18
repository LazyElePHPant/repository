<?php

namespace LazyElePHPant\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class Repository implements RepositoryInterface
{
    /** 
     * Application instance
     *
     * @var \Illuminate\Container\Container 
     */
    private $app;

    /**
     * Repository model
     * 
     * @var Illuminate\Database\Eloquent\Model
     */
    private $model;

    /**
     * Create a new instance
     *
     * @param  \Illuminate\Container\Container
     * @return void
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get the model's name
     *
     * @return string
     */
    abstract public function model();

    /**
     * @{inheritDoc}
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (! $model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model"
            );
        }

        return $this->model = $model;
    }

    /**
     * @{inheritDoc}
     */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
     * @{inheritDoc}
     */
    public function list($orderByColumn, $orderBy = 'desc', $with = [], $columns = ['*'])
    {
        return $this->model->with($with)
                           ->orderBy($orderByColumn, $orderBy)
                           ->get($columns);
    }

    /**
     * @{inheritDoc}
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @{inheritDoc}
     */
    public function update(array $data, $id, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @{inheritDoc}
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @{inheritDoc}
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    /**
     * @{inheritDoc}
     */
    public function findBy(string $field, mixed $value, $columns = array('*'))
    {
        return $this->model->where($field, $value)
                           ->select($columns)
                           ->first();
    }

    /**
     * @{inheritDoc}
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->model->paginate($perPage, $columns, $pageName, $page);
    }

    /**
     * @{inheritDoc}
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @{inheritDoc}
     */
    public function getModel()
    {
        return $this->model;
    }
}
