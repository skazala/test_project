<?php
abstract class Controller {

    protected $data = array();
    protected $view = "";
    protected $head = array('title' => '', 'description' => '');

    abstract function process($params);

    public function renderView() {
        if ($this->view) {
            extract($this->protect($this->data));// transforms array indexes into variables e.g. $title and $description
            extract($this->data, EXTR_PREFIX_ALL, "");
            require('views/' . $this->view . '.phtml');
        }
    }

    public function redirect($url) {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    private function protect($x = null) {
        if (!isset($x))
            return null;
        elseif (is_string($x)) 
            return htmlspecialchars($x, ENT_QUOTES);
        elseif(is_array($x)) {
            foreach ($x as $key => $value) {
                $x[$key] = $this->protect($value);
            }
            return $x;
        }
        else
            return $x;
    }

    public function addMessage($message) {
        if (isset($_SESSION['messages']))
            $_SESSION['messages'][] = $message;
        else
            $_SESSION['messages'] = array($message);
    }

    public function getMessages() {
        if (isset($_SESSION['messages'])) {
            $messages = $_SESSION['messages'];
            unset($_SESSION['messages']);
            return $messages;
        }
        else
            return array();
    }

}