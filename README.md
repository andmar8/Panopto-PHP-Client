Panopto-PHP-Client
==================

This is a standalone PHP client to Panopto API's 4.0 and 4.2, 4.2 is what is used in the PanoptoBookingEngine and is therefore slightly more mature.

The code is split into several sections:

* /includes/client: Abstract client
* /includes/commons: Useful/repeatedly used code
* /includes/dataObjects/objects: PHP implementations of the Panopto API Version 4.0 objects
* /includes/dataObjects/objects/requests: Panopto API Version 4.0 parameter objects used to pass requests to the API
* /includes/dataObjects/objects/responses: Panopto API Version 4.0 return type objects used to receieve responses from the API
* /includes/impl/X.X/client: Versioned implementations of clients to the various Panopto Endpoints
* /includes/impl/4.2/dataObjects: Extra request and response objects used in the new version of the API; where compatible, the 4.2 client still uses the original 4.0 API objects under /includes/dataObjects/
* /logger: A small class to easily insert DEBUG logging
* /soapDocs: This shows you the soapPHP's view of the API, you can see lists of methods and objects

Endpoints implemented:

* AccessManagement
* Authentication
* RemoteRecorder
* SessionManagement
* UserManagement

How to use /soapDocs (if you want to!)

* Browser to either index file
* You now need to specify which endpoint you want information for...
* At the end of the url specify a get parameter: http://example.com/soapDocs/4.2/?which=SessionManagement
* "which" can equal AccessManagement, Auth, RemoteRecorderManagement, SessionManagement or UserManagement
* Next you need to specify what sort of documenation you're interested in, either the web service methods or the objects
* At the end of the url specify another get parameter: http://example.com/soapDocs/4.2/?which=SessionManagement&docs=functions
* "docs" can equal functions (for web service methods) or types (for objects)
* NOTE: Remember to specify the correct API version in the URL http://example.com/soapDocs/4.0/ or http://example.com/soapDocs/4.2/