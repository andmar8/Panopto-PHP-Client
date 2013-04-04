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

class GetFoldersByExternalIdResponse
{
    private $GetFoldersByExternalIdResult;
    
    public function __construct($getFoldersByExternalIdResult)
    {
        $this->GetFoldersByExternalIdResult = $getFoldersByExternalIdResult->GetFoldersByExternalIdResult;
    }
    
    public function getFoldersByExternalIdResult()
    {
        return $this->GetFoldersByExternalIdResult;
    }

    public function getFolders()
    {
        $folders = array();
        $gfbeirFolders = isset($this->GetFoldersByExternalIdResult->Folder)?$this->GetFoldersByExternalIdResult->Folder:array();
        $gfbeirFolders = gettype($gfbeirFolders)=="array"?$gfbeirFolders:array($gfbeirFolders);
        foreach($gfbeirFolders as $folder)
        {
            $folders[] = new Folder($folder->AllowPublicNotes,$folder->AllowSessionDownload,
                                $folder->AudioPodcastITunesUrl,$folder->AudioRssUrl,
                                $folder->ChildFolders,$folder->Description,
                                $folder->EnablePodcast,$folder->Id,$folder->IsPublic,
                                $folder->ListUrl,$folder->Name,$folder->ParentFolder,
                                $folder->Sessions,$folder->SettingsUrl,
                                $folder->VideoPodcastITunesUrl,$folder->VideoRssUrl);
        }
        return $folders;
    }
}

?>
