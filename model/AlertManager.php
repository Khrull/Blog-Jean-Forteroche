<?php

namespace Forteroche\Blog\Model;

class AlertManager
{

    public function __CONSTRUCT()
    {
        session_start();
    }

    public function setFlash($message,$type)
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type'    => $type
        );
    }

    public function flash()
    {
        if(isset($_SESSION['flash'])){
            ?>
            <div class="alert alert-<?php echo $_SESSION['flash']['type'];?>">
                <a class="close">x</a>
                <?php echo $_SESSION['flash']['message']; ?>
            </div>
            <?php
            unset($_SESSION['flash']);
        }
    }
}