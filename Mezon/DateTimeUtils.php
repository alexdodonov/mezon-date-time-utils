<?php
namespace Mezon;

/**
 * Class DateTimeUtils
 *
 * @package Gui
 * @subpackage DateTimeUtils
 * @author Dodonov A.A.
 * @version v.1.0 (2019/09/18)
 * @copyright Copyright (c) 2019, aeon.org
 */

/**
 * Class provides dati-time routines
 */
class DateTimeUtils
{

    /**
     * Default date mask
     */
    public const DEFAULT_DATE_MASK = 'Y-m-d';

    /**
     * Method returns true if the $date is today
     *
     * @param string $date
     *            Date to be analyzed
     * @return bool true if the $date is today, false other wise
     */
    public static function isToday(string $date): bool
    {
        return date(DateTimeUtils::DEFAULT_DATE_MASK) == date(DateTimeUtils::DEFAULT_DATE_MASK, strtotime($date));
    }

    /**
     * Method returns true if the $date is yesterday
     *
     * @param string $date
     *            Date to be analyzed
     * @return bool true if the $date is yesterday, false other wise
     */
    public static function isYesterday(string $date): bool
    {
        return date(DateTimeUtils::DEFAULT_DATE_MASK, strtotime('-1 day')) ==
            date(DateTimeUtils::DEFAULT_DATE_MASK, strtotime($date));
    }

    /**
     * Locale setting
     *
     * @var string
     */
    public static $locale = 'ru';

    /**
     * Getting localized dictionary
     *
     * @return array Dictionary
     */
    protected static function getDictionary(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/../Res/l8n/' . self::$locale . '.json'), true);
    }

    /**
     * Method converts date to 'day full month name'
     *
     * @param string $date
     *            Date to be converted
     * @return string Converted date
     */
    public static function dayMonth(string $date): string
    {
        // TODO make 2 unit tests because 1 error was missed
        $dictionary = self::getDictionary();

        $dateTime = strtotime($date);

        return date('d', $dateTime) . ' ' . $dictionary[date('n', $dateTime)];
    }

    /**
     * Method caculates date difference in days
     *
     * @param string $dateFrom
     *            starting date
     * @param string $dateTo
     *            ending date
     * @return int amount of days between two dates
     */
    public static function dateDiffInDays(string $dateFrom, string $dateTo): int
    {
        $startTimeStamp = strtotime($dateFrom);
        $endTimeStamp = strtotime($dateTo);

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400; // 86400 seconds in one day

        // and you might want to convert to integer
        return intval($numberDays);
    }
}
