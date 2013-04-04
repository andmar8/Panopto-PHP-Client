Panopto-PHP-Client
==================

This is a standalone PHP client to Panopto API's 4.0 and 4.2, 4.2 is what is used in the PanoptoBookingEngine and is therefore slightly more mature. You shouldn't mix and match clients, user either 4.0 or 4.2.

This client does not support the whole API, but using a combination of the pattern used here and the soap docs functionality it would be fairly straight forward to add the missing functionality.

As of yet, the API for 4.3 has not been tested but should work, however we will need to update our copy of the source when we upgrade to 4.3 so an updated version should appear here at some point.

The code is split into several sections:
----------------------------------------

* /includes/client: Abstract client
* /includes/commons: Useful/repeatedly used code
* /includes/dataObjects/objects: PHP implementations of the Panopto API Version 4.0 objects
* /includes/dataObjects/objects/requests: Panopto API Version 4.0 parameter objects used to pass requests to the API
* /includes/dataObjects/objects/responses: Panopto API Version 4.0 return type objects used to receieve responses from the API
* /includes/impl/4.X/client: Versioned implementations of clients to the various Panopto Endpoints
* /includes/impl/4.2/dataObjects: Extra request and response objects used in the new version of the API; where compatible, the 4.2 client still uses the original 4.0 API objects under /includes/dataObjects/
* /logger: A small class to easily insert DEBUG logging into a file, you can vardump or just log a string, everything is date and timestamped :)
* /soapDocs: This shows you the soapPHP's view of the API, you can see lists of methods and objects

What are the dataObjects, requests and response objects for?
------------------------------------------------------------

Essentially these objects wrap the XML returned and required by the panopto endpoints in PHP objects, most are basically public access variables inside a class. This could probably be cleaned up to make it a little stricter "OO" but in some instances the variables need to be public access to be set by the soap library.

Ultimately what this gives you is the ability to work "only" with objects and abstracts the (often) ugliness of dealing with web services.

Using the code
--------------

Copy this code into your PHP working directory and include a client for the version and endpoint you want to talk to (under /includes/impl/4.X/client/), then create an AuthenticationInfo object and populate with  user/pass details, finally create a new
instance of the endpoint you want to talk to passing the server url and auth details....

<pre>
	require_once(dirname(__FILE__)."/includes/client/impl/AccessManagementClient.php");
	error_reporting(E_ALL);
	date_default_timezone_set("Europe/London");

	$server = "panoptoserver.url.here";
	$auth = new AuthenticationInfo("user","password",null);
	$AMClient = new AccessManagementClient($server, $auth);
</pre>

You should not need to include the dataObject, request and reponse object's in your code after you have included a client as all the dependancies should be included in the client.

Using the client object you can then directly call the methods (outlined below)...

Endpoints and methods implemented:
----------------------

Key -> Supported API versions - *response type* **Web Service Method**([&lt;( *parameter type* ) parameter&gt;,....])

Please take this as complementary to the official Panopto API (which has slightly more detail)

### AccessManagement

4.0/4.2 - *GetFolderAccessDetailsResponse* **getFolderAccessDetails**(
&nbsp;&nbsp;&nbsp;&lt;( *String* ) Folder id&gt;)

### Authentication

4.0/4.2 - **logOnWithExternalProvider**(
&nbsp;&nbsp;&nbsp;&lt;( *String* ) User Key&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *String* ) Authentication code&gt;)

### RemoteRecorder

4.2 - *GetRemoteRecordersByExternalIdResponse* **getRemoteRecorderByExternalId**(
&nbsp;&nbsp;&nbsp;&lt;( *String* ) The external Id of the remote recorder you want to fetch&gt;)

4.2 - *GetRemoteRecordersByExternalIdResponse* **getRemoteRecordersByExternalId**()

4.0/4.2 - *GetListRecordersResponse* **getRemoteRecordersList**(
&nbsp;&nbsp;&nbsp;&lt;( *Pagination* ) Pagination settings for the response&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *String* ) The field you want to sort by&gt;)

4.0/4.2 - **scheduleNewRecurringRecording**(<br/>
&nbsp;&nbsp;&nbsp;&lt;( *String* ) Name of the recording&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *String* ) Id of the folder the recording will be scheduled into&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *String* ) Start datetime&gt;,&lt;( *String* ) End datetime&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *ArrayOfString* ) Days of the week you want the schedule to recur on&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *String* ) The ending date time when you want the schedule to stop recurring&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *RecorderSettings* ) Specifies the settings for the recorders used for the recordings being scheduled&gt;,<br/>
&nbsp;&nbsp;&nbsp;&lt;( *Boolean* ) Whether you want the recording broadcast or not&gt;)

4.0/4.2 - *ScheduleRecordingResponse* **scheduleRecording**(&lt;( *String* ) Name of the recording&gt;,&lt;( *String* ) Id of the folder the recording will be scheduled into&gt;,&lt;( *String* ) Start datetime&gt;,&lt;( *String* ) End datetime as a string&gt;,&lt;( *RecorderSettings* ) Specifies the settings for the recorders used for the recordings being scheduled&gt;,&lt;( *Boolean* ) Whether you want the recording broadcast or not&gt;)

4.0/4.2 - *ScheduleRecurringRecordingResponse* **scheduleRecurringRecording**(&lt;( *String* ) The session Id for the schedule you want to recur&gt;,&lt;( *ArrayOfString* ) Days of the week you want the schedule to recur on&gt;,&lt;( *String* ) The ending date time when you want the schedule to stop recurring&gt;,&lt;( *Boolean* ) Do you want to add the original schedule Id to the list of recurrance&gt;)

4.2 - **setRemoteRecorderExternalId**(&lt;( *String* ) The Id of the remote recorder you want to set its external Id for&gt;,&lt;( *String* ) The external Id that you want to set&gt;)

### SessionManagement

4.0/4.2 - *AddFolderResponse* **addFolder**(&lt;( *String* ) &gt;)

4.0/4.2 - *AddSessionResponse* **addSession**()

4.0/4.2 - **deleteSessions**()

4.2 - *GetFoldersByExternalIdResponse* **getFoldersByExternalId**()

4.0/4.2 - *GetFoldersListResponse* **getFoldersList**()

4.2 - *GetSessionsByExternalIdResponse* **getSessionsByExternalId**()

4.0/4.2 - *GetSessionsListResponse* **getSessionsList**()

4.2 - **updateSessionExternalId**()

### UserManagement

4.0/4.2 - *GetUsersResponse* **GetUsers**()


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