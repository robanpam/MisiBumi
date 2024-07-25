<?php

if (!function_exists('formatEmission')) {
    /**
     * Format emissions into readable format (e.g., 1000 as 1K, 100000 as 1T)
     *
     * @param int $value
     * @return string
     */
    function formatEmission($value)
    {
        if ($value >= 100000) {
            return number_format($value / 100000, 1) . ' T'; // Format as tons
        } elseif ($value >= 1000) {
            return number_format($value / 1000, 1) . ' Kg'; // Format as kilograms
        } else {
            return (string) $value; // Return the value as it is if less than 1000
        }
    }
}
