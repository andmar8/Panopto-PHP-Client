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

class FolderAccessDetails
{
    public $FolderId;
    public $GroupsWithCreatorAccess;
    public $GroupsWithViewerAccess;
    public $IsPublic;
    public $UsersWithCreatorAccess;
    public $UsersWithViewerAccess;

    public function __construct($folderId,$groupsWithCreatorAccess,$groupsWithViewerAccess,
                                $isPublic,$usersWithCreatorAccess,$usersWithViewerAccess)
    {
        $this->FolderId = $folderId;
        $this->GroupsWithCreatorAccess = new ArrayOfGuid($groupsWithCreatorAccess);
        $this->GroupsWithViewerAccess = new ArrayOfGuid($groupsWithViewerAccess);
        $this->IsPublic = $isPublic;
        $this->UsersWithCreatorAccess = new ArrayOfGuid($usersWithCreatorAccess);
        $this->UsersWithViewerAccess = new ArrayOfGuid($usersWithViewerAccess);
    }
}

?>
