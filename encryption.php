<?php

    /*Encrypts a password with sha1.
    */
    function encryptPassword($intendedPass){
        return sha1($intendedPass);
    }
        
?>
