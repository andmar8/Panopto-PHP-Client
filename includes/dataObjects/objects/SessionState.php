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

class SessionState
{
    const Created = "Created"; //The session has just been created  
    const Scheduled = "Scheduled"; //The session is scheduled to be recorded  
    const Recording = "Recording"; //The session is currently recording  
    const Broadcasting = "Broadcasting"; //The session is currently broadcasting  
    const Processing = "Processing"; //The session is done being recorded and is being processed by the server  
    const Complete = "Complete"; //The session has been recorded and processed and can now be viewed

    public static function getSessionStateFromSessionStateName($stateString)
    {
        switch($stateString)
        {
            case "Created": return SessionState::Created;
            case "Scheduled": return SessionState::Scheduled;
            case "Recording": return SessionState::Recording;
            case "Broadcasting": return SessionState::Broadcasting;
            case "Processing": return SessionState::Processing;
            case "Complete": return SessionState::Complete;
        }
    }
}

?>
