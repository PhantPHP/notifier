<?php

declare(strict_types=1);

namespace Fixture\Entity\Transport;

use Phant\Notifier\Entity\Transport\Collection as TransportCollectionEntity;
use Fixture\Entity\Transport\Email as TransportEmailFixture;

final class Collection
{
    public static function get(): TransportCollectionEntity
    {
        return (new TransportCollectionEntity())
            ->add(
                TransportEmailFixture::get()
            );
    }
}
