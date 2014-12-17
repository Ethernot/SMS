
<?php
    #returns the array of files on the given directory
    function listDirectory($dir){

        $l=scandir($dir);

        return $l;

    }

    #checks if given log already exists on directory
    function logExists($logname,$dir)
    {
        $i = 0;
        $l = listDirectory($dir);

        while ($i < count($l)) {
            if($l[$i]===$logname)
                return True;

            $i = $i + 1;
        }
        return False;
    }

    #check if logs for a certain switch are updated and updates if they are not
    function updateLogs($switchname)
    {

        #obtains name that log is meant to have
        $logname=TUAFUNCAOPARAOBTERNOMEDOLOG();
        
        /*verifies if log has already been created.if it hasn't,it obtains the switche's configuration
        and then creates this day's log.*/
        if(!logExists($switchname,$logname)){
            TUAFUNCAOPARACRIARLOG();
        }


    }
    


?>
