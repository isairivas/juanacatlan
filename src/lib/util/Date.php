<?php

/**
 * Description of Date
 *
 * @author isai
 */
class Lib_Util_Date {

    public static function formatTo($format, $date) {
        $partes = false;
        $continue = false;
        switch ($format) {
            case 'Y-m-d':
                $partes = self::extractData($date, '/');
                if (!$partes) {
                    $partes = self::extractData($date, '-');
                }
                $continue = true;
                break;
            case 'd/m/Y':
                $partes = self::extractData($date, '-');
                if (!$partes) {
                    $partes = self::extractData($date, '/');
                }
                $continue = true;
                break;
        }

        if (!$partes) {
            return false;
        }
        if (!$continue) {
            return false;
        }
        $time = mktime(0, 0, 0, $partes['m'], $partes['d'], $partes['Y']);
        $newDate = date($format, $time);
        return $newDate;
    }

    private static function extractData($data, $delimeter) {

        $partes = explode($delimeter, $data);
        if (is_array($partes) && count($partes) == 3) {
            if ($delimeter == '/') {
                return array('Y' => $partes[2], 'm' => $partes[1], 'd' => $partes[0]);
            } else if ($delimeter == '-') {
                return array('Y' => $partes[0], 'm' => $partes[1], 'd' => $partes[2]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

