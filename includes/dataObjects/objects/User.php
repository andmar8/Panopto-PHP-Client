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

class User
{
    public $Email;
    public $EmailSessionNotifications;
    public $FirstName;
    public $GroupMemberships;
    public $LastName;
    public $SystemRole;
    public $UserBio;
    public $UserId;
    public $UserKey;
    public $UserSettingsUrl;

    function __construct($email = null, $emailSessionNotifications = null,
                            $firstName = null, $groupMemberships = null,
                            $lastName = null, $systemRole = null, $userBio = null,
                            $userId = null, $userKey = null, $userSettingsUrl = null)
    {
        $this->Email = $email;
        $this->EmailSessionNotifications = $emailSessionNotifications;
        $this->FirstName = $firstName;
        $this->GroupMemberships = new ArrayOfGuid($groupMemberships);
        $this->LastName = $lastName;
        $this->SystemRole = SystemRole::getSystemRoleFromSystemRoleName($systemRole);
        $this->UserBio = $userBio;
        $this->UserId = $userId;
        $this->UserKey = $userKey;
        $this->UserSettingsUrl = $userSettingsUrl;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getEmailSessionNotifications() {
        return $this->EmailSessionNotifications;
    }

    public function getFirstName() {
        return $this->FirstName;
    }

    public function getGroupMemberships() {
        return $this->GroupMemberships;
    }

    public function getLastName() {
        return $this->LastName;
    }

    public function getSystemRole() {
        return $this->SystemRole;
    }

    public function getUserBio() {
        return $this->UserBio;
    }

    public function getUserId() {
        return $this->UserId;
    }

    public function getUserKey() {
        return $this->UserKey;
    }

    public function getUserSettingsUrl() {
        return $this->UserSettingsUrl;
    }
}

?>
