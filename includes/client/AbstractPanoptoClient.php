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
    require_once(dirname(__FILE__)."/../../logger/Logger.php");

abstract class AbstractPanoptoClient
{
    protected $auth;
    protected $client;
    protected $endpointName;
    protected $logger;

    public function getFunctions()
    {
        echo "<h1>".$this->endpointName." Functions</h1>";
        echo "<pre>";print_r($this->client->__getFunctions());echo "</pre>";
    }

    public function getTypes()
    {
        echo "<h1>".$this->endpointName." Types</h1>";
        echo "<pre>";print_r($this->client->__getTypes());echo "</pre>";
    }

    public function log($string)
    {
        if (is_a($this->logger, 'Logger')) {
            $this->logger->log($string);
        }
    }
}
?>
