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
    require_once($panoptoClientRoot."/dataObjects/objects/Folder.php");
    require_once($panoptoClientRoot."/dataObjects/objects/Pagination.php");
    require_once($panoptoClientRoot."/dataObjects/objects/Session.php");
    //Requests
    require_once($panoptoClientRoot."/dataObjects/requests/AddFolder.php");
    require_once($panoptoClientRoot."/dataObjects/requests/AddSession.php");
    require_once($panoptoClientRoot."/dataObjects/requests/DeleteSessions.php");
    require_once($panoptoClientRoot."/dataObjects/requests/GetFoldersList.php");
    require_once($panoptoClientRoot."/dataObjects/requests/GetSessionsList.php");
    require_once($panoptoClientRoot."/dataObjects/requests/sortModifiers/FolderSortField.php");
    require_once($panoptoClientRoot."/dataObjects/requests/sortModifiers/SessionSortField.php");
    //Responses
    require_once($panoptoClientRoot."/dataObjects/responses/AddFolderResponse.php");
    require_once($panoptoClientRoot."/dataObjects/responses/AddSessionResponse.php");
    require_once($panoptoClientRoot."/dataObjects/objects/ArrayOfGuid.php");
    require_once($panoptoClientRoot."/dataObjects/responses/GetFoldersListResponse.php");
    require_once($panoptoClientRoot."/dataObjects/responses/GetSessionsListResponse.php");

class SessionManagementClient extends AbstractPanoptoClient
{
    public function __construct($server, AuthenticationInfo $auth)
    {
        $this->auth = $auth;
        $this->endpointName = "SessionManagement";
        $this->client = new SoapClient("https://".$server."/Panopto/PublicAPI/4.0/SessionManagement.svc?wsdl");
    }

    public function addFolder($name, $parentFolder = null, $isPublic = false)
    {
        return new AddFolderResponse($this->client->AddFolder(new AddFolder($this->auth,$name,$parentFolder,$isPublic)));
    }

    public function addSession($name, $folderId, $isBroadcast = false)
    {
        return new AddSessionResponse($this->client->AddSession(new AddSession($this->auth,$name,$folderId,$isBroadcast)));
    }

    public function deleteSessions($sessionIds)
    {
        /*return*/ $this->client->DeleteSessions(new DeleteSessions($this->auth,$sessionIds));
    }

    public function getFoldersList(ListFoldersRequest $listFoldersRequest, $searchQuery = null)
    {
        return new GetFoldersListResponse($this->client->GetFoldersList(new GetFoldersList($this->auth, $listFoldersRequest, $searchQuery)));
    }

    public function getSessionsList(ListSessionsRequest $listSessionRequest, $searchQuery = null)
    {
        return new GetSessionsListResponse($this->client->GetSessionsList(new GetSessionsList($this->auth, $listSessionRequest, $searchQuery)));
    }
}

?>