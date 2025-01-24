<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Model\Category;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\App\Model\Category;

class CategoryComponent extends OComponent {
  public bool      $more     = true;
  public ?Category $category = null;
}
