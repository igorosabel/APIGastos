<?php
use Osumi\OsumiFramework\App\Component\Model\Category\CategoryComponent;
?>
<?php if (is_null($category)): ?>
null
<?php else: ?>
{
	"id": {{ category.id }},
	"parent": <?php echo (is_null($category->id_parent) || $more === false) ? 'null' : new CategoryComponent(['category' => $category->getParent(), 'more' => false]) ?>,
	"name": {{ category.name | string }}
}
<?php endif ?>
