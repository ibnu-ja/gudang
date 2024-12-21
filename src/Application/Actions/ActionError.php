<?php

declare(strict_types=1);

namespace App\Application\Actions;

use JsonSerializable;

class ActionError implements JsonSerializable
{
    public const string BAD_REQUEST = 'BAD_REQUEST';
    public const string INSUFFICIENT_PRIVILEGES = 'INSUFFICIENT_PRIVILEGES';
    public const string NOT_ALLOWED = 'NOT_ALLOWED';
    public const string NOT_IMPLEMENTED = 'NOT_IMPLEMENTED';
    public const string RESOURCE_NOT_FOUND = 'RESOURCE_NOT_FOUND';
    public const string SERVER_ERROR = 'SERVER_ERROR';
    public const string UNAUTHENTICATED = 'UNAUTHENTICATED';
    public const string VALIDATION_ERROR = 'VALIDATION_ERROR';
    public const string VERIFICATION_ERROR = 'VERIFICATION_ERROR';


    public function __construct(
        public readonly string  $type,
        public readonly ?string $description = null
    )
    {
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'type' => $this->type,
            'description' => $this->description,
        ];
    }
}
