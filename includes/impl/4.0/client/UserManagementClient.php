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
    //Objects
    require_once($panoptoClientRoot."/dataObjects/objects/SystemRole.php");
    require_once($panoptoClientRoot."/dataObjects/objects/User.php");
    //Requests
    require_once($panoptoClientRoot."/dataObjects/requests/GetUsers.php");
    //Responses
    require_once($panoptoClientRoot."/dataObjects/responses/GetUsersResponse.php");

class UserManagementClient extends AbstractPanoptoClient
{
    public function __construct($server, AuthenticationInfo $auth)
    {
        $this->auth = $auth;
        $this->endpointName = "UserManagement";
        $this->client = new SoapClient("https://".$server."/Panopto/PublicAPI/4.0/UserManagement.svc?wsdl");
    }

    public function GetUsers($userIds)
    {
        return new GetUsersResponse($this->client->GetUsers(new GetUsers($this->auth, $userIds)));
    }
}

?>