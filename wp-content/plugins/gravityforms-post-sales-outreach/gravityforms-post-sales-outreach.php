<?php
/**
 * Plugin Name: 1POINT21 SALES OUTREACH Gravity Form Entries via Post
 * Plugin URI: //1point21interactive.com
 * Description: Posts Gravity Form Entries to Sales Outreach Tool
 * Version: 1.0
 * Author: 1POINT21 Interactive
 */

// https://stackoverflow.com/questions/20199961/gravityforms-show-field-name-instead-of-value
// https://www.gravitygeek.com/knowledge-base/how-to-get-entry-value-by-label/
// https://gist.github.com/RickeyMessick/fc1849be8305d253c921
// https://docs.gravityforms.com/form-object/

$myentry = array(
    "1" => "my full name",
    "2" => "my full name",
    "3" => "referral",
    "3.1" => "referral 2",
    "3.2" => "referral 3",
    "3.3" => "referral 4",
    "4" => "me@mydomain.com",
    "5" => "city name",
);

$myfields = array(
    "_labels" => array(
        "1" => "first name",
        "2" => "last name",
        "3" => array(
            "3" => "referral 1",
            "3.1" => "referral 2",
            "3.2" => "referral 3",
            "3.3" => "referral 4",
        ),
        "4" => "domain",
        "5" => "city",
    ));

$myfinal = array_merge_recursive($myentry, $myfields);

print_r($myfinal);

// $myfinal = array(
//     "1" => "my full name",
//     "2" => "my full name",
//     "3" => "referral",
//     "4" => "me@mydomain.com",
//     "5" => "city name",
//     "_labels" => array(
//         "1" => "first name",
//         "2" => "last name",
//         "3" => array(
//             "3" => "referral 1",
//             "3.1" => "referral 2",
//             "3.2" => "referral 3",
//             "3.3" => "referral 4",
//         ),
//         "4" => "domain",
//         "5" => "city",
//     ),
// );

foreach ($myfields as $hi => $hello) {

    $myfields[$hi] = $hello . 'there';

}

foreach ($array as $k => $a) {
    $array[$k] = json_encode($a);
}

add_action('gform_after_submission', 'post_to_sales_outreach', 10, 2);

function post_to_sales_outreach($entry, $form)
{

    foreach ($form["fields"] as &$field) {
        //see if this is a multi-field, like name or address
        if (is_array($field["inputs"])) {
            //loop through inputs
            foreach ($field["inputs"] as &$input) {
                $label = $input["label"];
                //get value from entry object; change the id to a string
                $value = $entry[strval($input["id"])];

                if (!empty($value)) {
                    $field["id"] = $label;
                }

            }
        } else {
            $label = $field["label"];
            //get value from entry object
            $value = $entry[$field["id"]];

            if (!empty($value)) {
                $field["id"] = $label;
            }

        }

    }

    wp_remote_post('https://enm68ib958uj3ju.m.pipedream.net', array(
        'method' => 'POST',
        'timeout' => 20,
        'headers' => array("Content-type" => "application/json", "X-GF-Webhooks-Key" => "418bca0d37ff498eb71be0f082b21710"),
        'body' => json_encode($myfinal),
    )
    );

}