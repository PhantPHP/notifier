<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Notification;

class Action
{
    public function __construct(
        public readonly string $url,
        public readonly string $label
    ) {
    }
}
