<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Transport;

use Phant\EmailSender\Port\EmailBuilder;
use Phant\EmailSender\Port\EmailSender;
use Phant\EmailSender\Service\HtmlToText;
use Phant\DataStructure\Web\Email as EmailMessage;
use Phant\Notifier\Entity\Channel;
use Phant\Notifier\Entity\Notification;

final class Email extends \Phant\Notifier\Entity\Transport
{
    public function __construct(
        public readonly EmailBuilder $emailBuilder,
        public readonly EmailSender $emailSender,
        public readonly string $fromEmailAddress,
        public readonly string $fromName
    ) {
    }

    public function getChannel(): Channel
    {
        return Channel::Email;
    }

    public function dispatch(
        Notification $notification
    ): bool {
        return $this->emailSender->send(
            $this->buildEmail($notification)
        );
    }

    protected function buildEmail(
        Notification $notification
    ): EmailMessage {
        return EmailMessage::make(
            $notification->title,
            $this->emailBuilder->getText($notification),
            $this->emailBuilder->getHtml($notification),
            $this->fromEmailAddress,
            $this->fromName,
            $notification->recipient->id,
            $notification->recipient->name
        );
    }
}
