<?php

namespace LazyElePHPant\Repository;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
	/**
	 * Get all the models from the storage
	 *
	 * @param  array  $columns
	 * @return \Illuminate\Support\Collection
	 */
    public function all($columns = ['*']);

	/**
	 * Lists all the models ordered with possible relations
	 *
	 * @param  mixed  $orderByColumn
	 * @param  mixed  $orderBy
	 * @param  array  $with
	 * @param  array  $columns
	 * @return \Illuminate\Support\Collection
	 */
    public function list($orderByColumn, $orderBy = 'desc', $with = [], $columns = ['*']);

    /**
     * Create a new model instance
     *
     * @param  array  $data
     * @return bool
     */
    public function create(array $data);

    /**
     * Update a model in storage
     *
     * @param  array  $data
     * @param  mixed  $id
     * @return bool
     */    
    public function update(array $data, $id);

    /**
     * Delete a new model instance
     *
     * @param  mixed  $id
     * @return bool
     */    
    public function delete($id);

    /**
     * Find a model in storage
     *
     * @param  mixed  $id
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, $columns = ['*']);

    /**
     * Find a model by a given criteria
     *
     * @param  string  $field
     * @param  mixed  $value
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model
     */    
    public function findBy($field, $value, $columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail($id, $columns = ['*']);

    /**
     * Paginate the given query.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);

    /**
     * Sets the repository model
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function setModel(Model $model);

    /**
     * Get the repository model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel();
}
