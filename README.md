# Oahu PHP client

## Installation

If you are using composer, just add `oahu/oahu`  this to your `composer.json` file :

    {
      "name" : "my/awesome-oahu-app",
      "version" : "0.1.0",
      "require" : {
        "oahu/oahu": "dev-master"
      }
    }


## Usage

### Configuration

    <?php 
    set_include_path(dirname(__FILE__) . ":");
    require('vendor/autoload.php');

    $config = array(
      'oahu' => array(
        "host"      => "api.example.com",
        "clientId"  => 'OAHU_CLIENT_ID',
        "appId"     => 'OAHU_APP_ID',
        "appSecret" => 'OAHU_APP_SECRET')
      )
    );

    $oahu = new Oahu_Client($config);


#### Using caching (with memcached)

API (GET) responses will be cached in Memcached if caching is enabled.

    <?php 
    set_include_path(dirname(__FILE__) . ":");
    require('vendor/autoload.php');

    $config = array(
      'oahu' => array(
        "host"      => "api.example.com",
        "clientId"  => 'OAHU_CLIENT_ID',
        "appId"     => 'OAHU_APP_ID',
        "appSecret" => 'OAHU_APP_SECRET'),
        "cache"     => "true",
        "cacheHost" => "127.0.0.1",
        "cachePort" => 11211,
        "cacheExpiration" => 120 // in seconds
      )
    );

    $oahu = new Oahu_Client($config);


### Making API Calls

`get`, `put`, `post` methods are directly available on your instance of Oahu_Client.

#### Examples using the API directly

##### Getting the list of Projects

    <?php
    $oahu->get('projects');



##### Getting Apps related to a Project

    <?php
    // where ':project_id' is a valid project_id
    $oahu->get('projects/:project_id/apps');

##### Getting PubAccounts related to a Project

    <?php
    // where ':project_id' is a valid project_id
    $oahu->get('projects/:project_id/pub_accounts');

###### Using pagination
    <?php 
    $oahu->get('projects', array('limit' => 10, 'page' => 2))


### Getting the infos on a User Account by its id

    $accountInfos   = $oahu->getAccount($accountId);

### Getting the current User Account if connected via Oahu connect

    $accountInfos = $oahu->getCurrentAccount();

### APIs

* [Clients](docs/clients.md)
* [Apps](docs/apps.md)
* [PubAccounts](docs/pub_accounts.md)
* [Projects](docs/projects.md)
* [Account](docs/accounts.md)
* [Player Accounts](docs/players.md)


### Method Helpers

##### [Projects API](docs/projects.md)

##### listProjects($params=array())

Returns a list of Projects for the current Client

##### getProject($projectId)

Returns a Project's infos

##### createProject($projectType, $projectData)

Creates a new Project

##### updateProject($projectId, $projectData)

Update a Project's infos

##### updateProjectPoster($projectId, $imageId)

Set the Project's Poster (default image)

##### updateProjectTrailer($projectId, $videoId)

Sets the Project's Trailer (default video)

##### getProjectResources($projectId, $params)

Get all Projects resources (Image, Video, ImageList, VideoList)

##### getProjectPhotos($projectId, $params)

Get all Project's Image resources

##### getProjectVideos($projectId, $params)

Get all Project's Video resources

##### listProjectPubAccounts($projectId)

Get all Project's PubAccounts (Facebook pages, Twitter accounts)

##### [Resources API](docs/resources.md)

##### createProjectResource($projectId, $resourceType, $resourceData)

Create a new Resource (Image, Video, ImageList, VideoList)

##### updateProjectResource($projectId, $resourceId, $resourceData) 

Update a single Resource

##### createProjectImageList($projectId, $resourceData)

Helper to create an ImageList

##### createProjectVideoList($projectId, $resourceData)

Helper to create an VideoList


##### [Apps API](docs/apps.md)



