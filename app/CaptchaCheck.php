<?php


class CaptchaCheck
{
    public $post;

    function __construct($post)
    {
        $this->post = $post;
    }

    function is_correct(){

        require_once "app/recaptchalib.php";

// Register API keys at https://www.google.com/recaptcha/admin
        $siteKey = "6Le9R-sUAAAAAJ-OqYXpatv3aM5BK6tn8pENFQ2Y";
        $secret = "6Le9R-sUAAAAAMGKP2R-sZuCw3AL3iaNbJYq0rre";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
        $lang = "en";

// The response from reCAPTCHA
        $resp = null;
// The error code from reCAPTCHA, if any
        $error = null;

        $reCaptcha = new ReCaptcha($secret);

// Was there a reCAPTCHA response?
        if ($this->post["g-recaptcha-response"]) {
            $resp = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $this->post["g-recaptcha-response"]
            );
        }
        if ($resp != null && $resp->success){
            return true;
        }else{
            return false;
        }
    }

}