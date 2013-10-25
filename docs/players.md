# Player Accounts

Players are account profiles on a specific app

### Example Player

```json
{
  "id": "526a3df909e50d263f000034",
  "account_id": "5261502e09e50d74c600000b",
  "created_at": "2013-10-25T11:46:34+02:00",
  "extra": {},
  "name": "Example User",
  "updated_at": "2013-10-25T11:46:33+02:00",
  "player_account": {
    "email": "example@oahu.fr",
    "name": "Example User",
    "picture": "http://graph.facebook.com/1111111111/picture?type=square",
    "url": "http://oahu.dev/og/5261502e09e50d74c600000b.html"
  },
  "badges": [{
    "data": {
      "score": 3,
      "highest_score": 3,
      "lowest_score": 3
    },
    "name": "A Quiz",
    "achievement_type": "OahuGame::Quiz",
    "picture": null,
    "id": "526a458209e50d263f000050"
  }],
  "provider_accounts": [{
    "id": "5261502e09e50d74c600000a",
    "_type": "ProviderAccounts::FacebookAccount",
    "name": "Example User",
    "picture": "http://graph.facebook.com/1111111111/picture?type=square",
    "uid": "1111111111",
    "url": "http://facebook.com/1111111111",
  }]
}
```

### Routes 

#### Listing players

GET /api/v1/clients/:client_id/apps/:app_id/players

*Optional params*
* limit - number of accounts returned
* page  - page number


#### Getting a Player

GET /api/v1/clients/:client_id/apps/:app_id/players/:player_id

