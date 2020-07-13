<?php
class Session {
    private $signedIn = false;
    private $userId;
    private $message;
    private $count;

    public function __construct() {
        // Start new or resume existing session
        session_start();

        $this->visitorCount();
        $this->checkTheLogin();
        $this->checkMessage();
    }

    // Counting visitors
    private function visitorCount() {
        if(isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }

    // Check message
    private function checkMessage() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    // Check the login
    private function checkTheLogin() {
        // Determine if a variable is declared and is different than NULL
        if(isset($_SESSION['user_id'])) {
            $this->userId = $_SESSION['user_id'];
            $this->signedIn = true;
        } else {
            // Unset a given variable
            unset($this->userId);
            $this->signedIn = false;
        }
    }

    // Session for message
    public function message($msg="") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    // Check sign in
    public function isSignedIn() {
        return $this->signedIn;
    }

    // Session for login
    public function login($user) {
        if($user) {
            $this->userId = $_SESSION['user_id'] = $user->id;
            $this->signedIn = true;
        }
    }

    // Unset session for logout
    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->userId);

        $this->signedIn = false;
    }

}
?>