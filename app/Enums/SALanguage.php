<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SALanguage extends Enum
{
    const English = 0;
    const Afrikaans = 1;
    const Zulu = 2;
}
