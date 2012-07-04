# Oahu PHP Client

## Installation & Configuration

    require_once('OahuClient.php');
    
    $host             = "api.oahu.fr";
    $client_id        = "YOUR_CLIENT_ID";
    $consumer_id      = "YOUR_COMSUMER_ID";
    $consumer_secret  = "YOUR_COMSUMER_SECRET";
    $no_cache         = true; // to bypass Oahu's api cache, useful for admin interfaces...
    
    $oahu = new OahuClient($host, $client_id, $consumer_id, $consumer_secret, $no_cache);

## Movies API

### Getting a Movie
  
```php
  $oahu->getMovie($movie_id)
```

  

Result: 
```json
  {
    "_id": "4ebe45b95a14285a6a000044",
    "_type": "Project::Movie",
    "client_id": "4ebe41355a14284df4000001",
    "countries": ["USA"],
    "created_at": "2011-11-12T11:08:57+01:00",
    "credits": [{
        "_id": "4ebe45b95a14285a6a000045",
        "job": "director",
        "name": "Francis Ford Coppola",
        "role": null
    },
    {
        "_id": "4ebe45b95a14285a6a000046",
        "job": "actor",
        "name": "Marlon Brando",
        "role": null
    }],
    "default_image_id": "4ebe45b95a14285a6a00008b",
    "default_video_id": null,
    "genres": ["Crime", "Drama"],
    "homepage": null,
    "published": true,
    "release_date": "1972-10-18",
    "slug": "the-godfather",
    "stylesheet_url": null,
    "synopsis": "The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.",
    "tags": [],
    "title": "The Godfather",
    "updated_at": "2012-06-29T10:06:05+02:00",
    "id": "4ebe45b95a14285a6a000044"
}
```

### Listing Movies


```php
  $oahu->listMovies($params)
```


Available Params: 
  
* `limit`   : limits the number of returned objects (default `30`)
* `sort`   : field used to sort results (default `release_date`)
* `order`   : direction of the sort (default `desc`)
* `filters` : array of filters (available filters on `year`, `genre`, `credits`, `tag`, `slug` )
  
  
example: 
  
```php
  // Latest 10 Movies
  $latest = $oahu->listMovies(array('limit' => 10));

  // Movies taggs 'featured'
  $featured = $oahu->listMovies(array('filters' => array('tag' => 'featured')));
  
  // All Movies, oldest first
  $all = $oahu->listMovies(array('sort' => 'release_date', 'order' => 'desc', 'limit' => 0));
  
```