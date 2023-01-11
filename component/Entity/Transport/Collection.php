<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Transport;

use Phant\Notifier\Entity\Transport;

final class Collection extends \Phant\DataStructure\Abstract\Collection
{
    public function add(
        Transport $item
    ): self {
        return parent::addItem($item);
    }
}
