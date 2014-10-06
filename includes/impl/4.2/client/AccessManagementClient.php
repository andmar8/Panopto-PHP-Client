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
    require_once($panoptoClientRoot."/dataObjects/objects/FolderAccessDetails.php");
    require_once($panoptoClientRoot."/dataObjects/objects/Pagination.php");
    require_once($panoptoClientRoot."/dataObjects/objects/AccessRole.php");
    require_once($panoptoClientRoot."/dataObjects/objects/ArrayOfGuid.php");
    //Requests
    require_once($panoptoClientRoot."/dataObjects/requests/GetFolderAccessDetails.php");
    require_once($panoptoClientRoot."/impl/4.2/dataObjects/requests/GrantUsersAccessToFolder.php");
    require_once($panoptoClientRoot."/impl/4.2/dataObjects/requests/RevokeUsersAccessFromFolder.php");
    //Responses
    require_once($panoptoClientRoot."/dataObjects/responses/GetFolderAccessDetailsResponse.php");

class AccessManagementClient extends AbstractPanoptoClient
{
    public function __construct($server, AuthenticationInfo $auth, $soapoptions = array(), $logenabled = true)
    {
        $this->auth = $auth;
        $this->endpointName = "AccessManagement";
        $this->client = new SoapClient("https://".$server."/Panopto/PublicAPI/4.2/AccessManagement.svc?wsdl", $soapoptions);
        if ($logenabled) {
            $this->logger = new Logger("/tmp/AccessManagement4.2.log");
        }
    }
    
    public function getFolderAccessDetails($folderId)
    {
        return new GetFolderAccessDetailsResponse($this->client->GetFolderAccessDetails(new GetFolderAccessDetails($this->auth,$folderId)));
    }

    public function grantUsersAccessToFolder($folderId, $userIds, $role)
    {
        $this->client->GrantUsersAccessToFolder(new GrantUsersAccessToFolder($this->auth, $folderId, new ArrayOfGuid($userIds), $role));
    }

    public function revokeUsersAccessFromFolder($folderId, $userIds, $role)
    {
        $this->client->RevokeUsersAccessFromFolder(new RevokeUsersAccessFromFolder($this->auth, $folderId, new ArrayOfGuid($userIds), $role));
    }
}

?>