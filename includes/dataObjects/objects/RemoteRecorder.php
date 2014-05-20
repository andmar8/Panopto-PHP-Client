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

class RemoteRecorder
{
    public $Devices;
    public $Id;
    public $ExternalId;
    public $MachineIP;
    public $Name;
    public $PreviewUrl;
    public $ScheduledRecordings;
    public $SettingsUrl;
    public $State;

    public function __construct($devices,$id,$externalId,$machineIP,$name,$previewUrl,$scheduledRecordings,$settingsUrl,$state)
    {
        $this->Devices = new ArrayOfRemoteRecorderDevice($devices);
        $this->Id = $id;
        $this->ExternalId = $externalId;
        $this->MachineIP = $machineIP;
        $this->Name = $name;
        $this->PreviewUrl = $previewUrl;
        $this->ScheduledRecordings = new ArrayOfGuid($scheduledRecordings);
        $this->SettingsUrl = $settingsUrl;
        $this->State = $state;
    }
    public function getDevices() {
        return $this->Devices;
    }

    public function getId() {
        return $this->Id;
    }

    public function getExternalId() {
        return $this->ExternalId;
    }

    public function getMachineIP() {
        return $this->MachineIP;
    }

    public function getName() {
        return $this->Name;
    }

    public function getPreviewUrl() {
        return $this->PreviewUrl;
    }

    public function getScheduledRecordings() {
        return $this->ScheduledRecordings;
    }

    public function getSettingsUrl() {
        return $this->SettingsUrl;
    }

    public function getState() {
        return $this->State;
    }
}

?>
