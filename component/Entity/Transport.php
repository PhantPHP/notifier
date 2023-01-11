<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity;

use Phant\Notifier\Entity\Channel;

abstract class Transport
{
    abstract public function dispatch(
        Notification $notification
    ): bool;

    abstract public function getChannel(): Channel;

    public function canBeTransported(
        Notification $notification
    ): bool {
        return $notification->channels->contains($this->getChannel());
    }
}
