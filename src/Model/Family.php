<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class Family extends OModel {
	#[OPK(
		comment: 'Id único para cada familia'
	)]
	public ?int $id;

	#[OField(
		comment: 'Nombre de la familia',
		max: 50,
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
	 * Listado de usuarios
	 */
	private ?array $users = null;

	/**
	 * Función para obtener el listado de usuarios de una familia
	 *
	 * @return ?array Devuelve el listado de usuarios de una familia
	 */
	public function getUsers(): array {
		if (is_null($this->users)) {
			$this->loadUsers();
		}
		return $this->users;
	}

	/**
	 * Función para asignar un listado de usuarios de una familia
	 *
	 * @param array $users Listado de usuarios de una familia a asignar
	 *
	 * @return void
	 */
	public function setUsers(array $users): void {
		$this->users = $users;
	}

	/**
	 * Función para cargar el listado de usuarios de una familia y asignarsela
	 *
	 * @return void
	 */
	public function loadUsers(): void {
		$this->setUsers(User::where(['id_family' => $this->id]));
	}
}
