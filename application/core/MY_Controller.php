<?php

class MY_Controller extends CI_Controller
{
    var $user_type = '';

    function __construct()
    {
        parent::__construct();
        // check if user is logged in

        if ($this->auth->isLoggedIn()) {

            if (
                !$this->auth->hasCompletedRegistration() && uri_string() !== 'membership/registration' &&
                uri_string() !== 'membership/add'
            ) {
                redirect('membership/registration');
            }
            if ($this->auth->getMembership()) {
                $mid = $this->auth->getMembership()?$this->auth->getMembership()->id:0;
                if (
                    $this->auth->getMembership()->verified !== 'yes'
                    && uri_string() !== 'membership/registration'
                    && uri_string() !== 'membership/unapproved'
                    && uri_string() !== "members/view/$mid"
                    && uri_string() !== "membership/edit/$mid"
                    && uri_string() !== 'membership/add'
                ) {
                    redirect('membership/unapproved');
                }
            }
        } else {
            $url = urlencode(current_url());
            redirect("sign-in?redirect_url=$url"); // go to login
        }
    }

    public function _remap($method, $params = array())
    {
        if ($this->auth->checkUriAuthorization()) {
            if (method_exists($this, $method)) {
                return call_user_func_array(array($this, $method), $params);
            }
            show_404();
        } else {
            show_error('Unauthorized Access', 401);
        }
    }
}
