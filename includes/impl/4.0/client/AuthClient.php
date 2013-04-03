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

    $panoptoClientRoot = dirname(__FILE__)."/../../..";
    require_once($panoptoClientRoot."/client/AbstractPanoptoClient.php");
    //Requests
    require_once($panoptoClientRoot."/dataObjects/requests/LogOnWithExternalProvider.php");

class AuthClient extends AbstractPanoptoClient
{
    public function __construct($server/*, AuthenticationInfo $auth*/)
    {
        //$this->auth = $auth;
        $this->endpointName = "Auth";
        $this->client = new SoapClient("https://".$server."/Panopto/PublicAPI/4.0/Auth.svc?wsdl");
    }
    
    public function logOnWithExternalProvider($userKey,$authCode)
    {
        return $this->client->LogOnWithExternalProvider(new LogOnWithExternalProvider($userKey, $authCode))->LogOnWithExternalProviderResult;
    }
}

?>