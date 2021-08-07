<?php

declare(strict_types=1);

namespace Encryption\Cipher\CAMELLIA;

use Encryption\Cipher\ACipherWithInitializationVector;
use Encryption\Traits\Decrypt;
use Encryption\Traits\EncryptWithPadding;

/**
 * Class Camellia192cfb1
 * @package Encryption\Cipher\CAMELLIA
 */
final class Camellia192cfb1 extends ACipherWithInitializationVector
{
    use Decrypt;
    use EncryptWithPadding;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 16;
    public const CIPHER = 'CAMELLIA-192-CFB1';
}
