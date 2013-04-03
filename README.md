Panopto-PHP-Client
==================

This is a standalone PHP client to Panopto API's 4.0 and 4.2, 4.2 is what is used in the PanoptoBookingEngine and is therefore slightly more mature. You shouldn't mix and match clients, user either 4.0 or 4.2.

The code is split into several sections:
----------------------------------------

* /includes/client: Abstract client
* /includes/commons: Useful/repeatedly used code
* /includes/dataObjects/objects: PHP implementations of the Panopto API Version 4.0 objects
* /includes/dataObjects/objects/requests: Panopto API Version 4.0 parameter objects used to pass requests to the API
* /includes/dataObjects/objects/responses: Panopto API Version 4.0 return type objects used to receieve responses from the API
* /includes/impl/X.X/client: Versioned implementations of clients to the various Panopto Endpoints
* /includes/impl/4.2/dataObjects: Extra request and response objects used in the new version of the API; where compatible, the 4.2 client still uses the original 4.0 API objects under /includes/dataObjects/
* /logger: A small class to easily insert DEBUG logging
* /soapDocs: This shows you the soapPHP's view of the API, you can see lists of methods and objects

Endpoints and methods implemented:
----------------------

Key -> Supported API versions - *response type* **Web Service Method**([&lt;parameters&gt;,....])

### AccessManagement

4.0/4.2 - *GetFolderAccessDetailsResponse* **getFolderAccessDetails**(&lt;folder id as a string&gt;)

### Authentication

4.0/4.2 - *Boolean(? needs checking)* **logOnWithExternalProvider**(&lt;User Key as a string&gt;,&lt;Authentication code as a string&gt;)

### RemoteRecorder

4.2 - *GetRemoteRecordersByExternalIdResponse* **getRemoteRecorderByExternalId**()

4.2 - *GetRemoteRecordersByExternalIdResponse* **getRemoteRecordersByExternalId**()

4.0/4.2 - *GetListRecordersResponse* **getRemoteRecordersList**()

4.0/4.2 - *Boolean(? needs checking)* **scheduleNewRecurringRecording**()

4.0/4.2 - *ScheduleRecordingResponse* **scheduleRecording**()

4.0/4.2 - *ScheduleRecurringRecordingResponse* **scheduleRecurringRecording**()

4.2 - **setRemoteRecorderExternalId**()

### SessionManagement

4.0/4.2 - *AddFolderResponse* **addFolder**()

4.0/4.2 - *AddSessionResponse* **addSession**()

4.0/4.2 - **deleteSessions**()

4.2 - *GetFoldersByExternalIdResponse* **getFoldersByExternalId**()

4.0/4.2 - *GetFoldersListResponse* **getFoldersList**()

4.2 - *GetSessionsByExternalIdResponse* **getSessionsByExternalId**()

4.0/4.2 - *GetSessionsListResponse* **getSessionsList**()

4.2 - **updateSessionExternalId**()

### UserManagement

4.0/4.2 - ** ****()

4.0/4.2 - ** ****()

4.0/4.2 - ** ****()

4.0/4.2 - ** ****()

4.0/4.2 - ** ****()

4.0/4.2 - ** ****()

How to use /soapDocs (if you want to!)
--------------------------------------

* Browser to either index file
* You now need to specify which endpoint you want information for...
* At the end of the url specify a get parameter: http://example.com/soapDocs/4.2/?which=SessionManagement
* "which" can equal AccessManagement, Auth, RemoteRecorderManagement, SessionManagement or UserManagement
* Next you need to specify what sort of documenation you're interested in, either the web service methods or the objects
* At the end of the url specify another get parameter: http://example.com/soapDocs/4.2/?which=SessionManagement&docs=functions
* "docs" can equal functions (for web service methods) or types (for objects)
* NOTE: Remember to specify the correct API version in the URL http://example.com/soapDocs/4.0/ or http://example.com/soapDocs/4.2/