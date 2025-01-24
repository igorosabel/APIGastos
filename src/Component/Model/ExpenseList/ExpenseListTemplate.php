<?php
use Osumi\OsumiFramework\App\Component\Model\Expense\ExpenseComponent;

foreach ($list as $i => $expense) {
  $component = new ExpenseComponent([ 'expense' => $expense ]);
	echo strval($component);
	if ($i < count($list) - 1) {
		echo ",\n";
	}
}
