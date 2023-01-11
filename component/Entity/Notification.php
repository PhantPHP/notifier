<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity;

use Phant\Error\NotCompliant;
use Phant\DataStructure\Web\EmailAddress;
use Phant\Notifier\Entity\Channel\Collection as ChannelCollection;
use Phant\Notifier\Entity\Notification\Action;
use Phant\Notifier\Entity\Notification\Recipient;

class Notification
{
    public function __construct(
        public readonly ChannelCollection $channels,
        public readonly string $title,
        public readonly string $message,
        public readonly ?Action $action,
        public readonly ?Recipient $recipient
    ) {
        $this->isCompliant();
    }

    protected function isCompliant(
    ): void {
        foreach ($this->channels->itemsIterator() as $channel) {
            switch ($channel) {
                case Channel::Email:
                    if (!$this->recipient) {
                        throw new NotCompliant('Recipient is require');
                    }

                    try {
                        new EmailAddress($this->recipient->id);
                    } catch (NotCompliant $e) {
                        throw new NotCompliant('Recipient address must be a valid email address');
                    }

                    break;
            }
        }
    }
}
