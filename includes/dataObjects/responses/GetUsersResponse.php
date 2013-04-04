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

class GetUsersResponse
{
    public $GetUsersResult;
    
    public function __construct($getUsersReponse)
    {
        $this->GetUsersResult = array();
        $result = $getUsersReponse->GetUsersResult;
        $totalNumberOfResults = count($result->User);
        if($totalNumberOfResults>1)
        {
            foreach($result->User as $user){$this->GetUsersResult[] = $this->addUser($user);}
        }
        else if($totalNumberOfResults==1)
        {
            $this->GetUsersResult[] = $this->addUser($result->User);
        }
    }

    public function addUser($user)
    {
        return new User($user->Email,
                        $user->EmailSessionNotifications,
                        $user->FirstName,
                        $user->GroupMemberships,
                        $user->LastName,
                        $user->SystemRole,
                        $user->UserBio,
                        $user->UserId,
                        $user->UserKey);
    }

    public function getUsers()
    {
        return $this->GetUsersResult;
    }
}

?>
