<?php

declare(strict_types=1);

namespace App\Enums\Profile;

use BenSampo\Enum\Enum;

/**
 * @method static static MANUFACTURER()
 * @method static static TRADINGCOMPANY()
 * @method static static RETAIL()
 * @method static static RAILROAD_AVIATION()
 * @method static static TRANSPORTATION_LOGISTICS()
 * @method static static ELECTRIC_POWER_GAS()
 * @method static static HOTEL_TRAVEL()
 * @method static static MEDICAL_WELFARE()
 * @method static static REALESTATE()
 * @method static static FINANCE()
 * @method static static HUMANRESSERVICE()
 * @method static static EDUCATION()
 * @method static static CONSULTING()
 * @method static static SOFTWARE_COMMUNICATION()
 * @method static static ADVERTISEMENT()
 * @method static static PUBLICCORPORATIONS()
 * @method static static OTHERS()
 */
final class Job extends Enum
{
    public const MANUFACTURER = 1; // メーカー

    public const TRADINGCOMPANY = 2; // 商社

    public const RETAIL = 3; // 小売

    public const RAILROAD_AVIATION = 4; // 鉄道・航空

    public const TRANSPORTATION_LOGISTICS = 5; // 運輸・物流

    public const ELECTRIC_POWER_GAS = 6; // 電力・ガス・エネルギー

    public const HOTEL_TRAVEL = 7; // ホテル・旅行

    public const MEDICAL_WELFARE = 8; // 医療・福祉

    public const REALESTATE = 9; // 不動産

    public const FINANCE = 10; // 金融

    public const HUMANRESSERVICE = 11; // 人材サービス

    public const EDUCATION = 12; // 教育

    public const CONSULTING = 13; // コンサルティング・調査

    public const SOFTWARE_COMMUNICATION = 14; // ソフトウエア・インターネット・通信

    public const ADVERTISEMENT = 15; // 広告・出版・マスコミ

    public const PUBLICCORPORATIONS = 16; // 公社・団体・官公庁

    public const OTHERS = 17; // その他

    /**
     * @param mixed $value
     * @return string
     */
    public static function getDescription(mixed $value): string
    {
        return match ($value) {
            self::MANUFACTURER => 'メーカー',
            self::TRADINGCOMPANY => '商社',
            self::RETAIL => '小売',
            self::RAILROAD_AVIATION => '鉄道・航空',
            self::TRANSPORTATION_LOGISTICS => '運輸・物流',
            self::ELECTRIC_POWER_GAS => '電力・ガス・エネルギー',
            self::HOTEL_TRAVEL => 'ホテル・旅行',
            self::MEDICAL_WELFARE => '医療・福祉',
            self::REALESTATE => '不動産',
            self::FINANCE => '金融',
            self::HUMANRESSERVICE => '人材サービス',
            self::EDUCATION => '教育',
            self::CONSULTING => 'コンサルティング・調査',
            self::SOFTWARE_COMMUNICATION => 'ソフトウエア・インターネット・通信',
            self::ADVERTISEMENT => '広告・出版・マスコミ',
            self::PUBLICCORPORATIONS => '公社・団体・官公庁',
            self::OTHERS => 'その他',
        };
    }
}
