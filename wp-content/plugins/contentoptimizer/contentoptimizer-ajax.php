<?php

/**
 * Short description.
 *
 * Long description.
 *
 * @since x.x.x
 */
class Content_Optimizer_Ajax
{

    public function __construct()
    {
        add_action('rest_api_init', array($this, 'rest_endpoint'));
        add_action('rest_api_init', array($this, 'test_rest_endpoint'));
    }

    public function rest_endpoint()
    {
        register_rest_route('v1/', '/content-optimizer', array(
            'methods' => 'POST',
            'callback' => array($this, 'api_results'),
        ));
    }

    public function test_rest_endpoint()
    {
        register_rest_route('v1/', '/test', array(
            'methods' => 'GET',
            'callback' => array($this, 'test_api_results'),
        ));
    }

    public function test_api_results()
    {
        $garrett = array("title" => "foo", "body" => "bar", "userId" => 1);
        $response = wp_remote_post('https://jsonplaceholder.typicode.com/posts', array(
            'method' => 'POST',
            'timeout' => 20,
            'headers' => array("Content-type" => "application/json"),
            'body' => json_encode($garrett),
        )
        );

        if (is_array($response) && !is_wp_error($response)) {

            return rest_ensure_response($response);

        }

    }

    /**
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit.
     *
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
     *
     * @param  string   $request   Lorem ipsum dolor sit amet, consectetur adipisicing elit.
     */
    public function api_results(WP_REST_Request $request)
    {
        $base_url = 'https://jsonplaceholder.typicode.com';
        $myposts = '/posts/';
        $dataId = $request['dataId'];
        $reports_list_url = $base_url . $myposts;
        $single_report_url = $base_url . $myposts . $dataId;

        if ($dataId == 'posts') {
            $endpoints_url = $reports_list_url;
        }
        if ($dataId == 1) {
            $endpoints_url = $single_report_url;
        }
        $response = wp_remote_get($endpoints_url);
        if (is_array($response) && !is_wp_error($response)) {
//$body = wp_remote_retrieve_body($response);
            wp_send_json($response);
// $data = json_decode($body);
            // $content = $data->body;
            // wp_send_json($content);
        }
    }
}