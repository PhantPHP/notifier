<?php

declare(strict_types=1);

namespace Phant\Notifier\Factory\Notification;

use Phant\Notifier\Entity\Notification\Content as ContentEntity;
use Phant\Notifier\Entity\Notification\Content\Body;
use Phant\Notifier\Entity\Notification\Content\Metadatas;
use Phant\Notifier\Entity\Notification\Content\Subject;

class Content
{
    public static function make(
        string|Subject $subject,
        null|string|Body $body,
        null|array|Metadatas $metadatas
    ): ContentEntity {
        if (is_string($subject)) {
            $subject = trim($subject);
            $subject = new Subject($subject);
        }

        if (is_string($body)) {
            $body = trim($body);
            $body = new Body($body);
        }

        if (is_array($metadatas)) {
            $metadataList = new Metadatas();
            foreach ($metadatas as $key => $value) {
                $metadataList->add(
                    $key,
                    $value
                );
            }
            $metadatas = $metadataList;
        }

        return new ContentEntity(
            $subject,
            $body,
            $metadatas
        );
    }
}
