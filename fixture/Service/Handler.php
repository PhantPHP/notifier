<?php

declare(strict_types=1);

namespace Fixture\Service;

use Phant\Notifier\Service\Handler as HandlerService;
use Fixture\Entity\Transport\Collection as TransportCollectionFixture;

final class Handler
{
    public function __invoke(): HandlerService
    {
        return new HandlerService(
            TransportCollectionFixture::get()
        );
    }
}
