<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity;

use Phant\Error\NotCompliant;
use Phant\DataStructure\Web\EmailAddressAndName;
use Phant\Notifier\Entity\Notification\Action;
use Phant\Notifier\Entity\Notification\Content;
use Phant\Notifier\Entity\Notification\Recipient;
use Phant\Notifier\Entity\Notification\Type;
use Phant\Notifier\Entity\Transport\Channel;

class Notification
{
    public function __construct(
        public readonly Type $type,
        public readonly Content $content,
        public readonly null|Action $action,
        public readonly Recipient $recipient,
        public readonly Channel $channel
    ) {
        $this->isCompliant();
    }

    protected function isCompliant(
    ): void {
        if (!$this->recipient->isCompliantWithChannel($this->channel)) {
            throw new NotCompliant('Recipient must be compliant with channel');
        }
    }
}
