<?php

declare(strict_types=1);

namespace App\Enums\Profile;

use BenSampo\Enum\Enum;

/**
 * @method static static LIVEALONE()
 * @method static static COHABITATION()
 * @method static static COUPLE()
 * @method static static ONECHILD()
 * @method static static TWOCHILD()
 * @method static static THREECHILD()
 * @method static static FOURCHILD()
 * @method static static OTHERS()
 */
final class Composition extends Enum
{
    public const LIVEALONE = 1; // 一人暮らし

    public const COHABITATION = 2; // 恋人と同棲で2人

    public const COUPLE = 3; // 夫婦のみで2人

    public const ONECHILD = 4; // 子供1人

    public const TWOCHILD = 5; // 子供2人

    public const THREECHILD = 6; // 子供3人

    public const FOURCHILD = 7; // 子供4人

    public const OTHERS = 8; // その他

    /**
     * @param mixed $value
     * @return string
     */
    public static function getDescription(mixed $value): string
    {
        return match ($value) {
            self::LIVEALONE => '1人暮らし',
            self::COHABITATION => '恋人と同棲で2人',
            self::COUPLE => '夫婦のみで2人',
            self::ONECHILD => '子供1人',
            self::TWOCHILD => '子供2人',
            self::THREECHILD => '子供3人',
            self::FOURCHILD => '子供4人',
            self::OTHERS => 'その他',
        };
    }
}
