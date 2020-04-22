<?php
namespace app\Captcha;

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

        $siteKey = '6Le9R-sUAAAAAJ-OqYXpatv3aM5BK6tn8pENFQ2Y';
        $secret = '6Le9R-sUAAAAAMGKP2R-sZuCw3AL3iaNbJYq0rre';
        $lang = 'ru';
        $resp = null;
        $error = null;
        $reCaptcha = new ReCaptcha($secret);
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
