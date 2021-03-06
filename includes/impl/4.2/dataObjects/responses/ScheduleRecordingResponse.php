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

class ScheduleRecordingResponse
{
    private $conflictingSessions;
    private $conflictsExist;
    private $sessionIDs;
    
    public function __construct($scheduleRecordingResponse)
    {
        $scheduleRecordingResult = $scheduleRecordingResponse->ScheduleRecordingResult;
        $this->conflictingSessions = $scheduleRecordingResult->ConflictingSessions;
        $this->conflictsExist = $scheduleRecordingResult->ConflictsExist;
        $this->sessionIDs = $scheduleRecordingResult->SessionIDs;
    }

    public function getGuid()
    {
        return $this->sessionIDs->guid;
    }

    public function getSessionIDs()
    {
        return $this->sessionIDs;
    }

    public function isConflictsExist()
    {
        return $this->conflictsExist;
    }

    public function getConflictingSessions()
    {
        return $this->conflictingSessions;
    }

}

?>
