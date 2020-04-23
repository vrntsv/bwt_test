<?php
namespace \CaptchaCheck::class;

class CaptchaCheck
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function isCorrect()
    {
        require_once 'app/recaptchalib.php';

        $secret = '6Le9R-sUAAAAAMGKP2R-sZuCw3AL3iaNbJYq0rre';
        $resp = null;
        $error = null;
        $reCaptcha = new \ReCaptcha($secret);
        if ($this->post['g-recaptcha-response']) {
            $resp = $reCaptcha->verifyResponse(
                $_SERVER['REMOTE_ADDR'],
                $this->post['g-recaptcha-response']
            );
        }
        if ($resp != null && $resp->success) {
            return true;
        } else {
            return false;
        }
    }
}
