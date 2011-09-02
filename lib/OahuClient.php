<?php
 
class OahuClient {
    
    public $oahuHost;
    public $clientId;
    public $consumerSecret;
    public $consumerId;
    public $noCache;
    
    
    static $modelTypes   = array(
      'Project'   => array('Movie'),
      'Resource'  => array('Image', 'Video')
    );
    
    static $modelFields  = array(
      'Project'   => array('title', 'release_date', 'synopsis', 'genres'),
      'Resource'  => array('source', 'name', 'description')
    );
    
    public $projectFilters = array("soon", "live", "featured", "recommended");
    
    function OahuClient($oahuHost="api.oahu.fr", $clientId, $consumerId, $consumerSecret, $noCache=false) {
        $this->oahuHost       = $oahuHost;
        $this->clientId       = $clientId;
        $this->consumerSecret = $consumerSecret;
        $this->consumerId     = $consumerId;
        $this->noCache        = $noCache;
    }
    
    // Movies API
    
    public function listMovies($filter=null) {
      if (!in_array($filter, $this->projectFilters)) {
        $filter = null;
      }
      return $this->_get("projects/" . $filter);
    }
    
    public function getMovie($projectId) {
      return $this->_get("projects/" . $projectId);
    }
        
    public function createMovie($projectData) {
      return $this->_post("projects", array(
        "_type"   => "Movie",
        "project" => self::_makeModel("Project", $projectData)
        )
      );
    }
    
    public function updateMovie($projectId, $projectData) {
      return $this->_put("projects/" . $projectId, array(
        "project" => self::_makeModel("Project", $projectData)
      ));
    }
    
    public function getMovieVideos($projectId) {
      return $this->_get("projects/" . $projectId . "/videos");
    }
    
    public function getMoviePhotos($projectId) {
      return $this->_get("projects/" . $projectId . "/photos");
    }

    public function getMovieBuzz($projectId) {
      return $this->_get("projects/" . $projectId . "/buzz");
    }
    
    public function getMovieResources($projectId, $params=array()) {
      return $this->_get("projects/" . $projectId . "/resources", $params);
    }
    
    public function getMoviePublications($projectId, $params=array()) {
      return $this->_get("projects/" . $projectId . "/publications", $params);
    }
    
    //  Resources API
    public function createMovieResource($projectId, $resourceType, $resourceData) {
      if (!in_array($resourceType, self::$modelTypes["Resource"])) {
        throw new Exception("ResourceType " . $resourceType . " does not exist");
      }
      return $this->_post("projects/". $projectId . '/resources', array(
        "_type"   => $resourceType,
        "resource" => self::_makeModel("Resource", $resourceData)
        )
      );
    }
    
    // Helpers
    
    private static function _makeModel($modelType, $data=array()) {
      $keys = array_intersect_key(self::$modelFields[$modelType], array_keys($data));
      $model = array();
      foreach ($keys as $k) {
        if ($data[$k]) {
          $model[$k] = stripslashes($data[$k]);
        }
      }
      return $model;
    }
    
    // HTTP Plumming...
    
    private function _get($path, $params=array(), $headers=array()) {
      $res = $this->_exec("GET", $path, $params, $headers);
      return $res['body'];
    }
    
    private function _post($path, $data, $headers=array()) {
      $res = $this->_exec("POST", $path, $data, $headers);
      return $res['body'];
    }
    
    private function _put($path, $data, $headers=array()) {
      $res =  $this->_exec("PUT", $path, $data, $headers);
      return $res['body'];
     }
    
    private function _exec($type, $path, $params = array(), $headers = array()) {
        $params["consumer_id"] = $this->consumerId;
        $params["consumer_secret"] = $this->consumerSecret;
        $params["format"] = "json";
        
        $s = curl_init();
        $headers[] = "Content-type: application/json";
        
        if ($this->noCache) {
          $headers[] = "Cache-Control: no-cache";
        }
        
        $url = "http://" . $this->oahuHost . "/v1/clients/" . $this->clientId . "/" . $path;
        switch ($type) {
            case "GET":
              curl_setopt($s, CURLOPT_URL, $url . "?" . http_build_query($params));
              break;
            case "PUT": 
              curl_setopt($s, CURLOPT_URL, $url);
              curl_setopt($s, CURLOPT_CUSTOMREQUEST, "PUT");
              curl_setopt($s, CURLOPT_POSTFIELDS, json_encode($params));
              break;            
            case "POST":
              curl_setopt($s, CURLOPT_URL, $url);
              curl_setopt($s, CURLOPT_POST, true);
              curl_setopt($s, CURLOPT_POSTFIELDS, json_encode($params));
              break;
        }

        curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($s, CURLOPT_HTTPHEADER, $headers);
        $out = curl_exec($s);
        $status = curl_getinfo($s, CURLINFO_HTTP_CODE);
        curl_close($s);
        $body = json_decode($out);
        if (!$body) {
          $body = array();
        }
        $res = array("status" => $status, "body" => $body);
        
        if ($status >= 400) {
          throw new Exception(json_encode($res));
        } else {
          return $res;
        }
    }
    
}