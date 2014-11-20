<?php

class TestTokenController extends BaseController {

    // /testtoken/token
    public function getToken()
    {
        $form  = Form::open(['url' => '/testtoken/result']);
        $form .= Form::submit('Submit Form With Token');
        $form .= Form::close();

        return $form;
    }

    // /testtoken/no-token
    public function getNoToken()
    {
        $form  = '<form method="post" action="/testtoken/result">';
        $form .= Form::submit('Submit Form Without Token');
        $form .= Form::close();

        return $form;
    }

    // /testtoken/bad-token
    public function getBadToken()
    {
        $form  = '<form method="post" action="/testtoken/result">';
        $form .= '<input type="hidden" name="_token" value="BadToken">';
        $form .= Form::submit('Submit Form With Bad Token');
        $form .= Form::close();

        return $form;
    }

    public function postResult()
    {
        return 'Token found!';
    }

}
