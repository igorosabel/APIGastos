<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Model\Family;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\App\Model\Family;

class FamilyComponent extends OComponent {
  public bool    $show_users = true;
  public ?Family $family = null;
}
