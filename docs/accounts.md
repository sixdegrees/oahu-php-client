# Player Accounts

### Example Account

```json
{
  "id": "5252b1f6873b0c557500e8e8",
  "account_id": "514890ae113b0c1622001107",
  "balance": {},
  "created_at": "2013-10-07T15:07:02+02:00",
  "extra": {},
  "name": null,
  "updated_at": "2013-10-07T15:07:02+02:00",
  "player_account": {
    "_id": "514890ae873b0c1692001107",
    "email": "example@example.com",
    "name": "My Real Name",
    "picture": "http://graph.facebook.com/1000011111111/picture?type=square"
  },
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

