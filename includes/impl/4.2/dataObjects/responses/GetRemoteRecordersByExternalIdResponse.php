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

class GetRemoteRecordersByExternalIdResponse
{
    private $GetRemoteRecordersByExternalIdResult;
    
    public function __construct($getRemoteRecordersByExternalIdResult)
    {
        $this->GetRemoteRecordersByExternalIdResult = $getRemoteRecordersByExternalIdResult->GetRemoteRecordersByExternalIdResult;
    }
    
    public function getRemoteRecordersByExternalIdResult()
    {
        return $this->GetRemoteRecordersByExternalIdResult;
    }

    public function getRemoteRecorder($rr = null)
    {
        $rrReturn = new RemoteRecorder(null,null,null,null,null,null,null,null,null);
        if($rr==null)
        {
            $rr = $this->GetRemoteRecordersByExternalIdResult->RemoteRecorder;
        }
        if($rr!=null)
        {
            //var_dump($rr);
            $rrReturn = new RemoteRecorder($rr->Devices,$rr->Id,$rr->ExternalId,$rr->MachineIP,$rr->Name,$rr->PreviewUrl,$rr->ScheduledRecordings,$rr->SettingsUrl,$rr->State);
        }
        return $rrReturn;
    }

    public function getRemoteRecorders()
    {
        $remoteRecorders = array();
        if(isset($this->GetRemoteRecordersByExternalIdResult->RemoteRecorder))
        {
            $rrs = $this->GetRemoteRecordersByExternalIdResult->RemoteRecorder;
            $rrCount = count($rrs);
            if($rrCount>0)
            {
                if($rrCount==1)
                {
                    $remoteRecorders[] = $this->getRemoteRecorder($rrs);
                }
                else
                {
                    foreach($rrs as $rr)
                    {
                        $remoteRecorders[] = $this->getRemoteRecorder($rr);
                    }
                }
            }
        }
        return $remoteRecorders;
    }
}

?>
