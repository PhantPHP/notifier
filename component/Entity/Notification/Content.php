<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Notification;

use Phant\Notifier\Entity\Notification\Content\Body;
use Phant\Notifier\Entity\Notification\Content\Metadatas;
use Phant\Notifier\Entity\Notification\Content\Subject;

class Content
{
    public function __construct(
        public readonly Subject $subject,
        public readonly ?Body $body,
        public readonly ?Metadatas $metadatas
    ) {
    }
}
