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
    // where 'xxxxxx' is a valid project_id
    $oahu->get('projects/xxxxxx/apps');

##### Getting PubAccounts related to a Project

    <?php
    // where 'xxxxxx' is a valid project_id
    $oahu->get('projects/xxxxxx/pub_accounts');

###### Using pagination
    <?php 
    $oahu->get('projects', array('limit' => 10, 'page' => 2))

##### Updating a Project

### Getting the current User if connected via Oahu connect

    $userId = $oahu->validateUserAccount();

#### Helper Methods

##### Projects API

###### listProjects($params=array())

###### getProject($projectId)

###### createProject($projectType, $projectData)

###### updateProject($projectId, $projectData)

###### updateProjectPoster($projectId, $imageId)

###### updateProjectTrailer($projectId, $videoId)

###### getProjectResources($projectId, $params)

###### getProjectPhotos($projectId, $params)

###### getProjectVideos($projectId, $params)

###### listProjectPubAccounts($projectId)

###### listProjectPublications($projectId, $params)

##### Resources API

###### getProjectResource($projectId, $resourceId)

###### createProjectResource($projectId, $resourceType, $resourceData)

###### updateProjectResource($projectId, $resourceId, $resourceData) 

###### createProjectImageList($projectId, $resourceData)

###### createProjectVideoList($projectId, $resourceData)
  




