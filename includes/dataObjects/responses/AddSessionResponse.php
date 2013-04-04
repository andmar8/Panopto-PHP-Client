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

class AddSessionResponse
{
    private $session;
    
    public function __construct($addSessionResult)
    {
        $addSessionResult = $addSessionResult->AddSessionResult;
        $this->session = new Session($addSessionResult->CreatorId,
                                        $addSessionResult->Description,
                                        $addSessionResult->Duration,
                                        $addSessionResult->EditorUrl,
                                        $addSessionResult->FolderId,
                                        $addSessionResult->Id,
                                        $addSessionResult->IsBroadcast,
                                        $addSessionResult->IsDownloadable,
                                        $addSessionResult->MP3Url,
                                        $addSessionResult->MP4Url,
                                        $addSessionResult->Name,
                                        $addSessionResult->NotesURL,
                                        $addSessionResult->OutputsPageUrl,
                                        new ArrayofGuid($addSessionResult->RemoteRecorderIds),
                                        $addSessionResult->SharePageUrl,
                                        $addSessionResult->StartTime,
                                        $addSessionResult->State,
                                        $addSessionResult->StatusMessage,
                                        $addSessionResult->ThumbUrl,
                                        $addSessionResult->ViewerUrl);
    }

    public function getSession()
    {
        return $this->session;
    }
}

?>
