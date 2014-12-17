<?php

    /*Verifies if a given password is valid and encrypts it with sha1..
    For it to be considered as valid,it needs to include uppercase,lowercase and numerical characters.
    If successful,returns the sha1 hash of that password.Otherwise returns NULL.
    */
    function encryptPassword($intendedPass){
        #verifies if password contains numbers and letters
        if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $intendedPass))
        {
            return NULL;
        }
        #verifies if pass contains upper and lower characters
        if((strtolower($intendedPass)===$intendedPass)||(strtoupper($intendedPass)===$intendedPass))
            return NULL;

        return sha1($intendedPass);
    }
        
?>
