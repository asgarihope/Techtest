<?php

namespace App\Repository;

use App\Repository\Interfaces\_BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class _BaseRepository implements _BaseRepositoryInterface {

	protected $model;

	public function __construct(Model $model) {
		$this->model = $model;
	}

	public function create(array $attributes): Model {
		$this->model = $this->model->create($attributes);

		return $this->model;
	}

	public function updateBy(string $column, $value, array $data): bool {
		return $this->model->where("{$column}", $value)->update($data);
	}
}
