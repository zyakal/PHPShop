<?php
    function getIUser() {
        return isset($_SESSION[_LOGINUSER]) ? $_SESSION[_LOGINUSER] : 0;
    }


