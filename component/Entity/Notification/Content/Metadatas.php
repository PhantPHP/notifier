<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Notification\Content;

use Phant\Error\NotCompliant;
use Phant\Error\NotFound;

class Metadatas
{
    protected array $items;

    public function __construct()
    {
    }

    public function add(
        string $key,
        int|float|string|bool|array $value
    ): self {
        self::cleanKey($key);

        $this->items[$key] = $value;

        return $this;
    }

    public function remove(
        string $key
    ): self {
        self::cleanKey($key);

        if (!isset($this->items[$key])) {
            throw new NotFound('Metadada not exist');
        }

        unset($this->items[$key]);

        return $this;
    }

    public function get(
        string $key
    ): int|float|string|bool|array {
        self::cleanKey($key);

        if (!isset($this->items[$key])) {
            throw new NotFound('Metadada not exist');
        }

        return $this->items[$key];
    }

    public function iterate(): \Generator
    {
        foreach ($this->items as $key => $value) {
            yield $key => $value;
        }
    }

    public function toArray(): array
    {
        return $this->items;
    }

    private static function cleanKey(
        string &$key
    ): void {
        $key = trim($key);

        if (!$key) {
            throw new NotCompliant('Incorrect key');
        }
    }
}
