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

class Folder
{
    public $AllowPublicNotes;
    public $AllowSessionDownload;
    public $AudioPodcastITunesUrl;
    public $AudioRssUrl;
    public $ChildFolders;
    public $Description;
    public $EnablePodcast;
    public $Id;
    public $IsPublic;
    public $ListUrl;
    public $Name;
    public $ParentFolder;
    public $Sessions;
    public $SettingsUrl;
    public $VideoPodcastITunesUrl;
    public $VideoRssUrl;

    public function __construct($allowPublicNotes = null,$allowSessionDownload = null,$audioPodcastITunesUrl = null,
                                $audioRssUrl = null,$childFolders = null,$description = null,$enablePodcast = null,
                                $id = null,$isPublic = null,$listUrl = null,$name = null,$parentFolder = null,$sessions = null,
                                $settingsUrl = null,$videoPodcastITunesUrl = null,$videoRssUrl = null)
    {
        $this->AllowPublicNotes = $allowPublicNotes;
        $this->AllowSessionDownload = $allowSessionDownload;
        $this->AudioPodcastITunesUrl = $audioPodcastITunesUrl;
        $this->AudioRssUrl = $audioRssUrl;
        $this->ChildFolders = new ArrayOfGuid($childFolders);
        $this->Description = $description;
        $this->EnablePodcast = $enablePodcast;
        $this->Id = $id;
        $this->IsPublic = $isPublic;
        $this->ListUrl = $listUrl;
        $this->Name = $name;
        $this->ParentFolder = $parentFolder;
        $this->Sessions = new ArrayOfGuid($sessions);
        $this->SettingsUrl = $settingsUrl;
        $this->VideoPodcastITunesUrl = $videoPodcastITunesUrl;
        $this->VideoRssUrl = $videoRssUrl;
    }
    public function getAllowPublicNotes() {
        return $this->AllowPublicNotes;
    }

    public function getAllowSessionDownload() {
        return $this->AllowSessionDownload;
    }

    public function getAudioPodcastITunesUrl() {
        return $this->AudioPodcastITunesUrl;
    }

    public function getAudioRssUrl() {
        return $this->AudioRssUrl;
    }

    public function getChildFolders() {
        return $this->ChildFolders;
    }

    public function getDescription() {
        return $this->Description;
    }

    public function getEnablePodcast() {
        return $this->EnablePodcast;
    }

    public function getId() {
        return $this->Id;
    }

    public function getIsPublic() {
        return $this->IsPublic;
    }

    public function getListUrl() {
        return $this->ListUrl;
    }

    public function getName() {
        return $this->Name;
    }

    public function getParentFolder() {
        return $this->ParentFolder;
    }

    public function getSessions() {
        return $this->Sessions;
    }

    public function getSettingsUrl() {
        return $this->SettingsUrl;
    }

    public function getVideoPodcastITunesUrl() {
        return $this->VideoPodcastITunesUrl;
    }

    public function getVideoRssUrl() {
        return $this->VideoRssUrl;
    }
}

?>
