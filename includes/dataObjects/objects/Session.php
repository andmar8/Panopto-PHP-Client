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

    require_once("SessionState.php");

class Session
{
    public $CreatorId;
    public $Description;
    public $Duration;
    public $EditorUrl;
    public $FolderId;
    public $Id;
    public $IsBroadcast;
    public $IsDownloadable;
    public $MP3Url;
    public $MP4Url;
    public $Name;
    public $NotesURL;
    public $OutputsPageUrl;
    public $RemoteRecorderIds;
    public $SharePageUrl;
    public $StartTime;
    public $State;
    public $StatusMessage;
    public $ThumbUrl;
    public $ViewerUrl;

    public function __construct($creatorId,$description,$duration,
                            $editorUrl,$folderId,$id,$isBroadcast,
                            $isDownloadable,$mP3Url,$mP4Url,$name,
                            $notesURL,$outputsPageUrl,$remoteRecorderIds,
                            $sharePageUrl,$startTime,$state,$statusMessage,
                            $thumbUrl,$viewerUrl)
    {
        $this->CreatorId = $creatorId;
        $this->Description = $description;
        $this->Duration = $duration;
        $this->EditorUrl = $editorUrl;
        $this->FolderId = $folderId;
        $this->Id = $id;
        $this->IsBroadcast = $isBroadcast;
        $this->IsDownloadable = $isDownloadable;
        $this->MP3Url = $mP3Url;
        $this->MP4Url = $mP4Url;
        $this->Name = $name;
        $this->NotesURL = $notesURL;
        $this->OutputsPageUrl = $outputsPageUrl;
        $this->RemoteRecorderIds = $remoteRecorderIds;
        $this->SharePageUrl = $sharePageUrl;
        $this->StartTime = $startTime;
        $this->State = SessionState::getSessionStateFromSessionStateName($state);
        $this->StatusMessage = $statusMessage;
        $this->ThumbUrl = $thumbUrl;
        $this->ViewerUrl = $viewerUrl;
    }

    public function getCreatorId() {
        return $this->CreatorId;
    }

    public function getDescription() {
        return $this->Description;
    }

    public function getDuration() {
        return $this->Duration;
    }

    public function getEditorUrl() {
        return $this->EditorUrl;
    }

    public function getFolderId() {
        return $this->FolderId;
    }

    public function getId() {
        return $this->Id;
    }

    public function getIsBroadcast() {
        return $this->IsBroadcast;
    }

    public function getIsDownloadable() {
        return $this->IsDownloadable;
    }

    public function getMP3Url() {
        return $this->MP3Url;
    }

    public function getMP4Url() {
        return $this->MP4Url;
    }

    public function getName() {
        return $this->Name;
    }

    public function getNotesURL() {
        return $this->NotesURL;
    }

    public function getOutputsPageUrl() {
        return $this->OutputsPageUrl;
    }

    public function getRemoteRecorderIds() {
        return $this->RemoteRecorderIds;
    }

    public function getSharePageUrl() {
        return $this->SharePageUrl;
    }

    public function getStartTime() {
        return $this->StartTime;
    }

    public function getState() {
        return $this->State;
    }

//    public function getStateName() {
//        return SessionState::getSessionStateNameFromSessionState($this->State);
//    }
    
    public function getStatusMessage() {
        return $this->StatusMessage;
    }

    public function getThumbUrl() {
        return $this->ThumbUrl;
    }

    public function getViewerUrl() {
        return $this->ViewerUrl;
    }
}

?>
