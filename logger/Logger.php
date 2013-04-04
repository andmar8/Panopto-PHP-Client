<?php
    /*
     * This file is part of Panopto-PHP-Client.
     *
     * Panopto-PHP-Client is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * Panopto-PHP-Client is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with Panopto-PHP-Client.  If not, see <http://www.gnu.org/licenses/>.
     *
     * Copyright: Andrew Martin, Newcastle University
     *
     */

class Logger
{
    private $seed; //Seed each call to the log instance with something, this allows you to differentiate logs calls by user for example
    private $logFile; //The name of the file on the server
    private $fh; //File Handle

    public function __construct($logFile,$seed = "")
    {
        $this->seed = $seed!=""?" ".$seed:"";
        $this->logFile = $logFile;
        $this->fh = fopen($this->logFile, 'a');
    }

    public function __destruct()
    {
       fclose($this->fh);
    }

    public function var_dump($object)
    {
        $this->log(var_export($object,true));
    }

    public function log($str)
    {
       fwrite($this->fh,date("Y-m-d H:i:s").$this->seed." : ".$str."\n");
    }
}

?>
