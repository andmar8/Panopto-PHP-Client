<?php
    /*
     * This file is part of Panopto-PHP-Client.
     * 
     * Panopto-PHP-Client is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     * 
     * Panopto-PHP-Client is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     * 
     * You should have received a copy of the GNU General Public License
     * along with Panopto-PHP-Client.  If not, see <http://www.gnu.org/licenses/>.
     * 
     * Copyright: Andrew Martin, Newcastle University
     * 
     */

class PanoptoCommons
{
    /**
     * Pass a positive number to add, negative number to remove seconds from the time
     * @param type $time
     * @param type $secondsToRemove
     * @return type 
     */
    public static function adjustSessionTime($time,$secondsToAdjust)
    {
        return date("H:i",strtotime($time)-$secondsToAdjust*-1);
    }

    public static function getTimestampFromPanoptoDateTime($dateTime)
    {
        return strtotime($dateTime);
    }

    public static function getLocalDateTimeAsUTCDateTime($dateTime)
    {
        $timestamp = PanoptoCommons::getTimestampFromPanoptoDateTime($dateTime);
        return date("Y-m-d\TH:i:s\Z",date("I",$timestamp)==1?$timestamp-=date("Z",$timestamp):$timestamp);
    }

    public static function getUTCDateTimeAsLocalDateTime($dateTime)
    {
        return date("Y-m-d\TH:i:s\Z",PanoptoCommons::getTimestampFromPanoptoDateTime($dateTime));
    }
    
    public static function getDateArrayFromPanoptoDateTime($dateTime)
    {
        $dateTimeArray = PanoptoCommons::getDateTimeArrayFromPanoptoDateTime($dateTime);
        return explode("-",$dateTimeArray[0]);
    }

    public static function getDateTimeArrayFromPanoptoDateTime($dateTime)
    {
        return explode("T",$dateTime);
    }

    public static function getTimeArrayFromPanoptoDateTime($dateTime)
    {
        $dateTimeArray = PanoptoCommons::getDateTimeArrayFromPanoptoDateTime($dateTime);
        $timeArray = explode(":",$dateTimeArray[1]);
        $secondsArray = explode("Z",$timeArray[2]);
        $timeArray[2] = $secondsArray[0];
        return $timeArray;
    }

    public static function daysTillSunday()
    {
        switch(strtolower(date("l")))
        {
            case "monday":      return 6;
            case "tuesday":     return 5;
            case "wednesday":   return 4;
            case "thursday":    return 3;
            case "friday":      return 2;
            case "saturday":    return 1;
            case "sunday":      return 0;
            default:            return -1;
        }
    }

    public static function getDateStringWithDaysAddedForDateString($dateString,$daysToAdd)
    {
        return date("Y-m-d",strtotime($dateString." +".$daysToAdd." day"));
    }

    public static function getPanoptoDateTimeFromDateStringAndTimeString($dateString,$timeString)
    {
        return $dateString."T".$timeString;
    }

    public static function getPanoptoDayOfWeekArrayForWeekDayNameArray($weekDayNumbers)
    {
        $panoptoDayOfWeeks = array();
        foreach($weekDayNumbers as $weekDayName)
        {
            switch(strtolower($weekDayName))
            {
                case "monday":      $panoptoDayOfWeeks[] = DayOfWeek::Monday; break;
                case "tuesday":     $panoptoDayOfWeeks[] = DayOfWeek::Tuesday; break;
                case "wednesday":   $panoptoDayOfWeeks[] = DayOfWeek::Wednesday; break;
                case "thursday":    $panoptoDayOfWeeks[] = DayOfWeek::Thursday; break;
                case "friday":      $panoptoDayOfWeeks[] = DayOfWeek::Friday; break;
                case "saturday":    $panoptoDayOfWeeks[] = DayOfWeek::Saturday; break;
                case "sunday":      $panoptoDayOfWeeks[] = DayOfWeek::Sunday; break;
                default:            $panoptoDayOfWeeks = null;
            }
        }
        return $panoptoDayOfWeeks;
    }
}

?>
