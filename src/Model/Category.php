<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;
use Osumi\OsumiFramework\ORM\ODB;

class Category extends OModel {
	#[OPK(
		comment: 'Id único para cada tipo de gasto'
	)]
	public ?int $id;

	#[OField(
		comment: 'Id de la categoria padre',
		ref: 'category.id'
	)]
	public ?int $id_parent;

	#[OField(
		comment: 'Nombre para el tipo de gasto',
		max: 100,
		nullable: false
	)]
	public ?string $name;

	#[OCreatedAt(
		comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
		comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;

	/**
	 * Categoría padre
	 */
	private ?Category $parent = null;

	/**
	 * Función para obtener la categoría padre de una categoría
	 *
	 * @return ?Category Devuelve la categoría padre o null si no tiene
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
	 * Función para asignar una categoría padre a una categoría
	 *
	 * @param Category $parent Categoría padre a asignar
	 *
	 * @return void
	 */
	public function setParent(Category $parent): void {
		$this->parent = $parent;
	}

	/**
	 * Función para cargar la categoría padre de una categoría y asignarsela
	 *
	 * @return void
	 */
	public function loadParent(): void {
		$this->setParent(Category::findOne(['id' => $this->id_parent]));
	}
}
