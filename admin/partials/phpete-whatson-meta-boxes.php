<?php
/**
 * This file contains HTML code for the whatson customer meta box
 *
 *
 * @link       https://phpete.com/
 * @since      1.0.0
 *
 * @package    Phpete_Whatson
 * @since      1.0.0
 * @package    Phpete_Whatson
 * @subpackage Phpete_Whatson/includes
 * @author     phpete <peter@phpete.com>
 *
 * @var bool $frequency The frequency of an activity.
 * @var bool $start_time The start time of an event.
 * @var bool $end_time The end time of an event.
 *
 * @function wp_nonce_field A security measure to ensure the form is being submitted by the original user
 *
 */

?>
<?php wp_nonce_field('save_whatson_meta_box', 'phpete_whatson_meta_box'); ?>
<div id='phpete-event-meta-box'>

    <div class='container'>
        <div class='row'>
            <div class='col-2'>
                <label for='phpete-whatson-frequency'>Frequency</label>
            </div>
            <div class='col-10'>
                <input id='phpete-whatson-frequency' type='text' name='phpete_whatson[frequency]' placeholder='e.g Every Tuesday' value='<?php echo $frequency; ?>' />
            </div>
        </div>
        <div class='row'>
            <div class='col-2'>
                <label for='phpete-whatson-start-time'>Start Time</label>
            </div>
            <div class='col-10'>
                <input id='phpete-whatson-start-time' type='time' name='phpete_whatson[start_time]' value='<?php echo $start_time; ?>' />
            </div>
        </div>
        <div class='row'>
            <div class='col-2'>
                <label for='phpete-whatson-end-time'>End Time</label>
            </div>
            <div class='col-10'>
                <input id='phpete-whatson-end-time' type='time' name='phpete_whatson[end_time]' value='<?php echo $end_time; ?>' />
            </div>
        </div>
    </div>

</div>