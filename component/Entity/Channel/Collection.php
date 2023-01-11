<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Channel;

use Phant\Notifier\Entity\Channel;

final class Collection extends \Phant\DataStructure\Abstract\Collection
{
    public function add(
        Channel $item
    ): self {
        return parent::addItem($item);
    }

    public function contains(
        Channel $item
    ): bool {
        return parent::containsItem($item);
    }
}
