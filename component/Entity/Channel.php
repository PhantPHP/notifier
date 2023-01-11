<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity;

enum Channel: string
{
    case Browser = 'browser';

    case Chat = 'chat';

    case Email = 'email';

    case Push = 'push';

    case Sms = 'sms';
}
