<?php

declare(strict_types=1);

namespace Phant\Notifier\Service;

use Phant\Notifier\Entity\Notification;
use Phant\Notifier\Entity\Transport\Collection as TransportCollection;

final class Handler
{
    public function __construct(
        public readonly TransportCollection $transports
    ) {
    }

    public function dispatch(
        Notification $notification
    ): void {
        foreach ($this->transports->iterate() as $transport) {
            if (!$transport->canBeTransported($notification)) {
                continue;
            }

            $transport->dispatch(
                $notification
            );
        }
    }
}
