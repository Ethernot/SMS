<?php

    #saves a password and its hash value on the passwords file(one pass per line).
    function savepassword($pass){
        #NOTA:FACHAVOR DE MUDAR ESTA MERDA PARA O NOME CORRETO FICHEIRO QUE TAS A USAR CARALHO
        $fp=fopen("ficheiro.bin","ab");
        $line=$pass." ".sha1($pass)."\n";

        fwrite($fp,$line);
        fclose($fp);

    }

    /*reads the pairs password/encrypted password from the passwords file and returns
     * a bidimensional array with the pairs.
      */
    function readpasswords(){

        $res=array();

        #NOTA:FACHAVOR DE MUDAR ESTA MERDA PARA O NOME CORRETO FICHEIRO QUE TAS A USAR CARALHO
        $fp=fopen("ficheiro.bin","rb");

        while(($line=fgets($fp))!==false){
            $aux=explode(" ",$line);

            array_push($res,$aux);
        }
        return $res;
        fclose($fp);
    }
    
    
?>
