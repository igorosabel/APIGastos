<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;
use Osumi\OsumiFramework\App\Module\Home\Index\IndexComponent;

ORoute::layout(DefaultLayoutComponent::class, function() {
  ORoute::get('/', IndexComponent::class);
});
