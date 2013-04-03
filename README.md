Panopto-PHP-Client
==================

This is a standalone PHP client to Panopto API's 4.0 and 4.2, 4.2 is what is used in the PanoptoBookingEngine and is therefore slightly more mature.

The code is split into several sections:

* /includes/client: Abstract client
* /includes/commons: Useful/repeatedly used code
* /includes/dataObjects: 
* /includes/impl/X.X/client: Versioned implementations of clients to the various Panopto Endpoints
* /includes/impl/4.2/dataObjects: Extra request and response objects used in the new version of the API; where compatible the 4.2 client still uses the original 4.0 API objects
* /logger:
* /soapDocs:

Endpoints implemented:

* AccessManagement
* Authentication
* RemoteRecorder
* SessionManagement
* UserManagement
