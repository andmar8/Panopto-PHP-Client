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
?>
<!DOCTYPE html>
<html>
<head>
    <title>API 4.0</title>
</head>
<body>
<?
    error_reporting(E_ALL);
    require_once(dirname(__FILE__)."/../../includes/dataObjects/objects/AuthenticationInfo.php");
    require_once(dirname(__FILE__)."/../../includes/impl/4.0/client/AccessManagementClient.php");
    require_once(dirname(__FILE__)."/../../includes/impl/4.0/client/AuthClient.php");
    require_once(dirname(__FILE__)."/../../includes/impl/4.0/client/RemoteRecorderManagementClient.php");
    require_once(dirname(__FILE__)."/../../includes/impl/4.0/client/SessionManagementClient.php");
    require_once(dirname(__FILE__)."/../../includes/impl/4.0/client/UserManagementClient.php");
    
    $which = isset($_GET["which"])?$_GET["which"]:"";
    $docs = isset($_GET["docs"])?$_GET["docs"]:"";
    $client = null;

    $server = "panopto.example.com";
    $auth = new AuthenticationInfo("username","password",null);
    switch($which)
    {
        case "AccessManagement" : $client = new AccessManagementClient($server, $auth); break;
        case "Auth" : $client = new AuthClient($server/*, $auth*/); break;        
        case "RemoteRecorderManagement" : $client = new RemoteRecorderManagementClient($server, $auth); break;
        case "SessionManagement" : $client = new SessionManagementClient($server, $auth); break;
        case "UserManagement" : $client = new UserManagementClient($server, $auth); break;
        default:
                    echo "specify for e.g. ?which=AccessManagement&docs=functions"; return;
    }
    switch($docs)
    {
        case "functions" : $client->getFunctions(); break;
        case "types" : $client->getTypes(); break;
        default:
                    echo "specify for e.g. ?which=AccessManagement&docs=functions";
    }
?>
</body>
</html>
