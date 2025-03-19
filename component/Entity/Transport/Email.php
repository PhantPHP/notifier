<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Transport;

use Phant\EmailSender\Port\EmailSender;
use Phant\EmailSender\Service\EmailBuilder;
use Phant\EmailSender\Service\HtmlToText;
use Phant\DataStructure\Web\Email as EmailMessage;
use Phant\Notifier\Entity\Notification;
use Phant\Notifier\Entity\Transport\Channel;

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
            (string) $notification->content->subject,
            (new HtmlToText())((string) $notification->content->body),
            (string) $notification->content->body,
            $this->fromEmailAddress,
            $this->fromName,
            (string) ($notification->recipient->value?->emailAddress ?? $notification->recipient->value),
            $notification->recipient->value?->name ?? null
        );
    }
}
