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

class ListSessionsRequest
{
    public $EndDate;
    public $FolderId;
    public $Pagination;
    public $RemoteRecorderId;
    public $SortBy;
    public $SortIncreasing;
    public $StartDate;
    public $States;

    public function __construct($endDate,$folderId,$pagination,$remoteRecorderId,$sortBy,$sortIncreasing,$startDate,$states)
    {
        $this->EndDate = $endDate;
        $this->FolderId = $folderId;
        $this->Pagination = $pagination;
        $this->RemoteRecorderId = $remoteRecorderId;
        $this->SortBy = $sortBy;
        $this->SortIncreasing = $sortIncreasing;
        $this->StartDate = $startDate;
        $this->States = $states;
    }
}

?>
