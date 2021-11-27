<?php

declare(strict_types=1);

namespace Encryption\Cipher\RC2;

use Encryption\Cipher\ACipherNoInitializationVector;
use Encryption\Traits\DecryptNoIV;
use Encryption\Traits\EncryptWithPaddingNoIV;

/**
 * Class Rc2ecb
 * @package Encryption\Cipher\RC2
 */
final class Rc2ecb extends ACipherNoInitializationVector
{
    use DecryptNoIV;
    use EncryptWithPaddingNoIV;

    public const BLOCK_SIZE = 8;
    public const IV_LENGTH = 0;
    public const CIPHER = 'RC2-ECB';
}
