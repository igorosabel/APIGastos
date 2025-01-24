<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Model\Expense;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\App\Model\Expense;

class ExpenseComponent extends OComponent {
  public ?Expense $expense = null;
}
