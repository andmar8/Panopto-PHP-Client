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

    $panoptoClientRoot = dirname(__FILE__)."/../../..";
    require_once($panoptoClientRoot."/client/AbstractPanoptoClient.php");
    //Objects
    require_once($panoptoClientRoot."/dataObjects/objects/DayOfWeek.php");
    require_once($panoptoClientRoot."/dataObjects/objects/Pagination.php");
    require_once($panoptoClientRoot."/dataObjects/objects/RemoteRecorder.php");
    require_once($panoptoClientRoot."/dataObjects/objects/RemoteRecorderDevice.php");
    require_once($panoptoClientRoot."/dataObjects/objects/RecorderSettings.php");
    require_once($panoptoClientRoot."/dataObjects/objects/ScheduleRecording.php");
    require_once($panoptoClientRoot."/dataObjects/objects/ScheduleRecurringRecording.php");
    //Requests
    require_once($panoptoClientRoot."/dataObjects/requests/listModifier/ListRecorders.php");
    require_once($panoptoClientRoot."/dataObjects/requests/sortModifiers/RecorderSortField.php");
    //Responses
    require_once($panoptoClientRoot."/dataObjects/objects/ArrayOfGuid.php");
    require_once($panoptoClientRoot."/dataObjects/responses/ArrayOfRemoteRecorderDevice.php");
    require_once($panoptoClientRoot."/dataObjects/responses/GetListRecordersResponse.php");
    require_once($panoptoClientRoot."/dataObjects/responses/ScheduleRecordingResponse.php");
    require_once($panoptoClientRoot."/dataObjects/responses/ScheduleRecurringRecordingResponse.php");

class RemoteRecorderManagementClient extends AbstractPanoptoClient
{
    public function __construct($server, AuthenticationInfo $auth)
    {
        $this->auth = $auth;
        $this->endpointName = "RemoteRecorderManagement";
        $this->client = new SoapClient("https://".$server."/Panopto/PublicAPI/4.0/RemoteRecorderManagement.svc?wsdl");
    }

    public function getRemoteRecordersList(Pagination $pagination, $sortBy = null)
    {
        return new GetListRecordersResponse($this->client->ListRecorders(new ListRecorders($this->auth, $pagination, $sortBy)));
    }
    
    public function scheduleRecording($name, $folderId, $start, $end, $recorderSettings, $isBroadcast = false)
    {
        return new ScheduleRecordingResponse($this->client->ScheduleRecording(new ScheduleRecording($this->auth, $name, $folderId, $isBroadcast, $start, $end, $recorderSettings)));
    }

    /**
     * $addOriginalId if true adds the $scheduledSessionId to the end of the response list
     * of guids of newly created sessions
     * 
     * @param type $scheduledSessionId
     * @param type $daysOfWeek
     * @param type $end
     * @param type $addOriginalId
     * @return ScheduleRecurringRecordingResponse 
     */
    public function scheduleRecurringRecording($scheduledSessionId, $daysOfWeek, $end, $addOriginalId = false)
    {
        return new ScheduleRecurringRecordingResponse($this->client->ScheduleRecuringRecording(new ScheduleRecurringRecording($this->auth, $scheduledSessionId, $daysOfWeek, $end)),$addOriginalId?$scheduledSessionId:null);
    }
    
    /**
     * Schedules a new recording, then schedules all the reoccurrances and returns a list of all
     * newly created session Ids (including the original session that the reoccurance is based upon)
     * 
     * @param type $name
     * @param type $folderId
     * @param type $isBroadcast
     * @param type $startDateAndTime
     * @param type $endDateAndTime
     * @param type $repeatingDaysOfWeek
     * @param type $endDateAndTimeOfRecurrence
     * @param type $recorderSettings
     * @return ScheduleRecurringRecordingResponse 
     */
    public function scheduleNewRecurringRecording($name, $folderId, $startDateAndTime, $endDateAndTime, $repeatingDaysOfWeek, $endDateAndTimeOfRecurrence, $recorderSettings, $isBroadcast = false)
    {
        $scheduledSessionId = $this->scheduleRecording($name, $folderId, $startDateAndTime, $endDateAndTime, $recorderSettings, $isBroadcast);
        return $this->scheduleRecurringRecording($scheduledSessionId->getGuid(), $repeatingDaysOfWeek, $endDateAndTimeOfRecurrence, true);
    }
}

?>