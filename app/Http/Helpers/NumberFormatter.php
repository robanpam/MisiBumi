<?php

if (!function_exists('formatNumber')) {
    /**
     * Format numbers into readable format (e.g., 1000000 to 1M, 800000 to 800K)
     *
     * @param int $number
     * @return string
     */
    function formatNumber($number)
    {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 1) . 'K';
        } else {
            return (string) $number;
        }
    }
}
