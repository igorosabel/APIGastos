<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;
use Osumi\OsumiFramework\ORM\ODB;

class Expense extends OModel {
	#[OPK(
		comment: 'Id único para cada gasto'
	)]
	public ?int $id;

	#[OField(
		comment: 'Id del usuario que crea el gasto',
		ref: 'user.id'
	)]
	public ?int $id_user;

	#[OField(
		comment: 'Id del tipo de gasto',
		ref: 'category.id',
		nullable: true,
		default: null
	)]
	public ?int $id_category;

	#[OField(
		comment: 'Concepto del gasto',
		max: 100,
		nullable: true,
		default: null
	)]
	public ?string $concept;

	#[OField(
	  comment: 'Importe del gasto',
	  nullable: false,
		default: 0
	)]
	public ?float $amount;

	#[OCreatedAt(
		comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
		comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;

	/**
	 * Usuario
	 */
	private ?User $user = null;

	/**
	 * Función para obtener el usuario del gasto
	 *
	 * @return ?User Devuelve el usuario del gasto
	 */
	public function getUser(): ?User {
		if (is_null($this->user)) {
			$this->loadUser();
		}
		return $this->user;
	}

	/**
	 * Función para asignar el usuario del gasto
	 *
	 * @param User $user Usuario del gasto a asignar
	 *
	 * @return void
	 */
	public function setUser(User $user): void {
		$this->user = $user;
	}

	/**
	 * Función para cargar el usuario del gasto y asignarsela
	 *
	 * @return void
	 */
	public function loadUser(): void {
		$this->setUser(User::findOne(['id' => $this->id_user]));
	}

	/**
	 * Categoría del gasto
	 */
	private ?Category $parent = null;

	/**
	 * Función para obtener la categoría la categoría del gasto
	 *
	 * @return ?Category Devuelve la categoría del gasto o null si no tiene
	 */
	public function getParent(): ?Category {
		if (is_null($this->id_parent)) {
			return null;
		}
		if (is_null($this->parent)) {
			$this->loadParent();
		}
		return $this->parent;
	}

	/**
	 * Función para asignar la categoría del gasto
	 *
	 * @param Category $parent Categoría del gasto a asignar
	 *
	 * @return void
	 */
	public function setParent(Category $parent): void {
		$this->parent = $parent;
	}

	/**
	 * Función para cargar la categoría del gasto y asignarsela
	 *
	 * @return void
	 */
	public function loadParent(): void {
		$this->setParent(Category::findOne(['id' => $this->id_category]));
	}
}
