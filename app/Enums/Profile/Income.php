<?php

declare(strict_types=1);

namespace App\Enums\Profile;

use BenSampo\Enum\Enum;

/**
 * @method static static ZERO_TO_TWO_HUNDRED()
 * @method static static TWO_HUNDRED_TO_FOUR_HUNDRED()
 * @method static static FOUR_HUNDRED_TO_SIX_HUNDRED()
 * @method static static SIX_HUNDRED_TO_EIGHT_HUNDRED()
 * @method static static EIGHT_HUNDRED_TO_ONE_THOUSAND()
 * @method static static OVER_ONE_THOUSAND()
 */
final class Income extends Enum
{
    public const ZERO_TO_TWO_HUNDRED = 1; // 0~200万円

    public const TWO_HUNDRED_TO_FOUR_HUNDRED = 2; // 200~400万円

    public const FOUR_HUNDRED_TO_SIX_HUNDRED = 3; // 400~600万円

    public const SIX_HUNDRED_TO_EIGHT_HUNDRED = 4; // 600~800万円

    public const EIGHT_HUNDRED_TO_ONE_THOUSAND = 5; // 800~1000万円

    public const OVER_ONE_THOUSAND = 6; // 1000万円以上

    /**
     * @param mixed $value
     * @return string
     */
    public static function getDescription(mixed $value): string
    {
        return match ($value) {
            self::ZERO_TO_TWO_HUNDRED => '0~200万円',
            self::TWO_HUNDRED_TO_FOUR_HUNDRED => '200~400万円',
            self::FOUR_HUNDRED_TO_SIX_HUNDRED => '400~600万円',
            self::SIX_HUNDRED_TO_EIGHT_HUNDRED => '600~800万円',
            self::EIGHT_HUNDRED_TO_ONE_THOUSAND => '800~1000万円',
            self::OVER_ONE_THOUSAND => '1000万円以上',
        };
    }
}
