<?php

function up_rest_api_signin_handler($request)
{
    $params = $request->get_json_params();

    $response = ['status' => '1', 'error' => null, 'params' => $params];


    if (
        !isset($params['user_login'], $params['password']) ||
        empty($params['user_login']) ||
        empty($params['password'])
    ) {
        $response['error'] = 'The email is either missing or incorrect. Password might be missing or incorrect.';
        return $response;
    }

    $email = sanitize_email($params['user_login']);
    $password = sanitize_text_field($params['password']);

    $user = wp_signon([
        'user_login' => $email,
        'user_password' => $password,
        'remember' => true
    ]);

    if (is_wp_error($user)) {
        $response['error'] = 'Issues loggin in the user';
        return $response;
    }

    $response['status'] = 2;

    return $response;
}