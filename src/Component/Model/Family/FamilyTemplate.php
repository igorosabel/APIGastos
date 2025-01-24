<?php
use Osumi\OsumiFramework\App\Component\Model\UserList\UserListComponent;
?>
<?php if (is_null($family)): ?>
null
<?php else: ?>
{
	"id": {{ family.id }},
	"name": {{ family.name | string }},
	"users": [<?php echo ($show_users) ? new UserListComponent(['list' => $family->getUsers()]) : '' ?>]
}
<?php endif ?>
