<?php

declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class User implements JsonSerializable
{
    public ?int $id {
        get {
            return $this->id;
        }
    }

    public string $username {
        get {
            return $this->username;
        }
    }

    public string $firstName {
        get {
            return $this->firstName;
        }
    }

    public string $lastName {
        get {
            return $this->lastName;
        }
    }

    public function __construct(?int $id, string $username, string $firstName, string $lastName)
    {
        $this->id = $id;
        $this->username = strtolower($username);
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}
