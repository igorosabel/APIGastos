<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class User extends OModel {
	#[OPK(
		comment: 'Id único para cada usuario'
	)]
	public ?int $id;

	#[OField(
		comment: 'Id de la familia a la que pertenece',
		ref: 'family.id',
		nullable: true,
		default: null
	)]
	public ?int $id_family;

	#[OField(
		comment: 'Nombre del usuario',
		nullable: false,
		max: 20
	)]
	public ?string $name;

	#[OField(
		comment: 'Email del usuario',
		nullable: false,
		max: 100
	)]
	public ?string $email;

	#[OField(
		comment: 'Contraseña cifrada del usuario',
		nullable: false,
		max: 100,
		visible: false
	)]
	public ?string $pass;

	#[OCreatedAt(
		comment: 'Fecha de creación del registro'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
		comment: 'Fecha de última modificación del registro'
	)]
	public ?string $updated_at;

	/**
	 * Familia del usuario
	 */
	private ?Family $family = null;

	/**
	 * Función para obtener la familia de un usuario
	 *
	 * @return ?Family Devuelve la familia o null si no tiene
	 */
	public function getFamily(): ?Family {
		if (is_null($this->id_family)) {
			return null;
		}
		if (is_null($this->family)) {
			$this->loadFamily();
		}
		return $this->family;
	}

	/**
	 * Función para asignar una familia a un usuario
	 *
	 * @param Family $family Familia de un usuario
	 *
	 * @return void
	 */
	public function setFamily(Family $family): void {
		$this->family = $family;
	}

	/**
	 * Función para cargar la familia de un usuario y asignarsela
	 *
	 * @return void
	 */
	public function loadFamily(): void {
		$this->setFamily(Family::findOne(['id' => $this->id_family]));
	}
}
