<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Notification;

enum Type: string
{
    case Error = 'error';

    case Warning = 'warning';

    case Confirmation = 'confirmation';

    case Information = 'information';
}
