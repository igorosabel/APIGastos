<?php
use Osumi\OsumiFramework\App\Component\Model\Family\FamilyComponent;
?>
<?php if (is_null($user)): ?>
null
<?php else: ?>
{
	"id": {{ user.id }},
	"name": {{ user.name | string }},
	"email": {{ user.email | string }},
	"family": <?php echo is_null($user->id_family) ? 'null' : new FamilyComponent(['family' => $user->getFamily(), 'show_users' => false]) ?>,
}
<?php endif ?>
