<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Notification;

class Recipient
{
    public function __construct(
        public readonly string $id,
        public readonly string $name
    ) {
    }
}
