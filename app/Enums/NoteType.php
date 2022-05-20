<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NoteType extends Enum
{
    const Urgent = '1';
    const Normal = '2';
    const Date = '3';

    public static function parseDatabase($value)
    {
        return (int) $value;
    }
}
