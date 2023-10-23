<?php
/**
 * This class contains a library of helper functions
 * to be used throughout the plugin
 *
 * @link       https://phpete.com
 * @since      1.0.0
 *
 * @package    Phpete_Whatson
 * @subpackage Phpete_Whatson/includes
 *
 * @author     phpete <peter@phpete.com>
 */

class Phpete_Whatson_Helper {

    /**
     * Sanitizes, trims and removes white-space
     *
     * @param string $value Expected to be a string
     * @since 1.0.0
     */
    public function process_frequency ($value) {
        $value = trim($value);
        $value = strip_tags($value);
        $value = preg_replace('!\s+!', ' ', $value);

        return sanitize_text_field($value);
    }

    /**
     * Returns the $value parameter.
     *
     * More processing code will be added in future versions
     *
     * @param string $value Expected to be a string
     * @since 1.0.0
     */
    public function process_start_time ($value) {
        return sanitize_text_field($value);
    }

    /**
     * Returns the $value parameter.
     *
     * More processing code will be added in future versions
     *
     * @param string $value Expected to be a string
     * @since 1.0.0
     */
    public function process_end_time ($value) {
        return sanitize_text_field($value);
    }

    /**
     * Checks if the frequency input contains
     * 1-64 characters
     *
     * @param $value
     * @since 1.0.0
     */
    public function is_frequency_valid($value){
        if(strlen($value) <= 64 && strlen($value) > 0){
            return true;
        }
        return false;
    }

    /**
     * Checks if the start_time input is a valid date
     *
     * @param $value
     * @since 1.0.0
     */
    public function is_start_time_valid($value){
        $date = DateTime::createFromFormat('H:i', $value);
        if (empty($value) || ($date && $date->format('H:i') == $value)) {
            return true;
        }
        return false;
    }

    /**
     * Checks if the end_time input is a valid date
     *
     * @param $value
     * @since 1.0.0
     */
    public function is_end_time_valid($value){
        $date = DateTime::createFromFormat('H:i', $value);
        if (empty($value) || ($date && $date->format('H:i') == $value)) {
            return true;
        }
        return false;
    }

}