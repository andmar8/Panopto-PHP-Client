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

class GetSessionsByExternalIdResponse
{
    private $GetSessionsByExternalIdResult;
    
    public function __construct($getSessionsByExternalIdResult)
    {
        $this->GetSessionsByExternalIdResult = $getSessionsByExternalIdResult->GetSessionsByExternalIdResult;
    }
    
    public function getSessionsByExternalIdResult()
    {
        return $this->GetSessionsByExternalIdResult;
    }

    public function getSession($session = null)
    {
        $sessionReturn = new Session(null,null,null,null,null,null,null,
                                    null,null,null,null,null,null,null,
                                    null,null,null,null,null,null);
        if($session==null)
        {
            $session = $this->GetSessionsByExternalIdResult->Session;
        }
        if($session!=null)
        {
            $sessionReturn = new Session($session->CreatorId,$session->Description,$session->Duration,
                            $session->EditorUrl,$session->FolderId,$session->Id,$session->IsBroadcast,
                            $session->IsDownloadable,$session->MP3Url,$session->MP4Url,$session->Name,
                            $session->NotesURL,$session->OutputsPageUrl,$session->RemoteRecorderIds,
                            $session->SharePageUrl,$session->StartTime,$session->State,
                            $session->StatusMessage,$session->ThumbUrl,$session->ViewerUrl);
        }
        return $sessionReturn;
    }

    public function getSessions()
    {
        $sessions = array();
        if(isset($this->GetSessionsByExternalIdResult->Session))
        {
            $ss = $this->GetSessionsByExternalIdResult->Session;
            $ssCount = count($ss);
            if($ssCount>0)
            {
                if($ssCount==1)
                {
                    $sessions[] = $this->getSession($ss);
                }
                else
                {
                    foreach($ss as $session)
                    {
                        $sessions[] = $this->getSession($session);
                    }
                }
            }
        }
        return $sessions;
    }
}

?>
