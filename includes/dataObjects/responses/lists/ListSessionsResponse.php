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

class ListSessionsResponse
{
    private $sessions;
    private $numberOfSessions;
    
    public function __construct($results,$totalNumberResults)
    {
        $this->sessions = array();
        if($totalNumberResults>1)
        {
            foreach($results->Session as $session){$this->sessions[] = $this->addSession($session);}
        }
        else if($totalNumberResults==1)
        {
            $this->sessions[] = $this->addSession($results->Session);
        }
        $this->numberOfFolders = $totalNumberResults;
    }
    
    private function addSession($session)
    {
        return new Session(
                    $session->CreatorId,
                    $session->Description,
                    $session->Duration,
                    $session->EditorUrl,
                    $session->FolderId,
                    $session->Id,
                    $session->IsBroadcast,
                    $session->IsDownloadable,
                    $session->MP3Url,
                    $session->MP4Url,
                    $session->Name,
                    $session->NotesURL,
                    $session->OutputsPageUrl,
                    new ArrayofGuid($session->RemoteRecorderIds),
                    $session->SharePageUrl,
                    $session->StartTime,
                    $session->State,
                    $session->StatusMessage,
                    $session->ThumbUrl,
                    $session->ViewerUrl
                    );
    }

    public function getSessions()
    {
        return $this->sessions;
    }
    
    public function getNumberOfSessions()
    {
        return $this->numberOfSessions;
    }
}

?>
