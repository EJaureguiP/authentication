<?php


function send($emails, $subject, $message, $from, $reply_to)
{
    // Get full html:
    $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
            <title>' . html_escape($subject) . '</title>
            <style type="text/css">
                body {
                    font-family: Arial, Verdana, Helvetica, sans-serif;
                    font-size: 16px;
                }
            </style>
        </head>
        <body>
        ' . $message . '
        </body>
        </html>';
    // Also, for getting full html you may use the following internal method:
    //$body = $this->email->full_html($subject, $message);

    $ci = get_instance();
    $ci->load->library('email');
    $result = $ci->email
        ->from($from)
        ->reply_to($reply_to)    // Optional, an account where a human being reads.
        //->to('jgomez@martechmedical.com')
        ->to($emails)
        ->subject($subject)
        ->message($body)
        ->send();


    var_dump($result);

    echo $ci->email->print_debugger();
    exit;
}
