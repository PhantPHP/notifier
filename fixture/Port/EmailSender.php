<?php

declare(strict_types=1);

namespace Fixture\Port;

use Phant\DataStructure\Web\Email;

final class EmailSender implements \Phant\EmailSender\Port\EmailSender
{
    public function send(
        Email $email
    ): bool {
        return true;
    }
}
