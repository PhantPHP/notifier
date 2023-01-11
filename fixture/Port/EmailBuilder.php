<?php

declare(strict_types=1);

namespace Fixture\Port;

final class EmailBuilder implements \Phant\EmailSender\Port\EmailBuilder
{
    public function getText(
        mixed $notification
    ): string {
        return $notification->message;
    }

    public function getHtml(
        mixed $notification
    ): string {
        return $notification->message;
    }
}
