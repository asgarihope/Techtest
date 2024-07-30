<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;

class UserRepository extends _BaseRepository implements UserRepositoryInterface {

	public function __construct(User $model) {
		parent::__construct($model);
	}

	/**
	 * @param array $attributes
	 * @return User
	 */
	public function create(array $attributes): User {
		return parent::create($attributes);
	}

	public function exist(string $mobile): ?User {
		return $this->model
			->where('email', $mobile)
			->first();
	}

}
