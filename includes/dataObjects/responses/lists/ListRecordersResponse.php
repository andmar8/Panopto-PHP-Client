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

class ListRecordersResponse
{
    private $recorders;
    private $numberOfRecorders;
    
    public function __construct($results,$totalNumberResults)
    {
        $this->recorders = array();
        if(is_array($results->RemoteRecorder))
        {
            foreach($results->RemoteRecorder as $remoteRecorder){$this->recorders[] = $this->addRemoteRecorder($remoteRecorder);}
        }
        else if(is_object($results->RemoteRecorder))
        {
            $this->recorders[] = $this->addRemoteRecorder($results->RemoteRecorder);
        }
        $this->numberOfRecorders = $totalNumberResults;
    }
    
    private function addRemoteRecorder($remoteRecorder)
    {
        return new RemoteRecorder(
                        $remoteRecorder->Devices
                        ,$remoteRecorder->Id
                        ,$remoteRecorder->ExternalId
                        ,$remoteRecorder->MachineIP
                        ,$remoteRecorder->Name
                        ,$remoteRecorder->PreviewUrl
                        ,$remoteRecorder->ScheduledRecordings
                        ,$remoteRecorder->SettingsUrl
                        ,$remoteRecorder->State
                        );
    }

    public function getRecorders()
    {
        return $this->recorders;
    }

    public function getNumberOfRecorders()
    {
        return $this->numberOfRecorders;
    }
}

?>
