# Oahu PHP Client

## Installation & Configuration

    require_once('OahuClient.php');
    
    $host             = "api.oahu.fr";
    $client_id        = "YOUR_CLIENT_ID";
    $consumer_id      = "YOUR_COMSUMER_ID";
    $consumer_secret  = "YOUR_COMSUMER_SECRET";
    $no_cache         = true; // to bypass Oahu's api cache, useful for admin interfaces...
    
    $oahu = new OahuClient($host, $client_id, $consumer_id, $consumer_secret, $no_cache);

