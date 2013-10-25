# Projects

### Example PubAccount

```json
{
  "id": "4d89bb7463060b542e00014f",
  "client_id": "5bb5c26bacb93e792f000007",
  "project_id": "523077c5893b0c9a1f007803",
  "_type": "PubAccounts::FacebookWall",
  "created_at": "2012-07-23T16:05:19+02:00",
  "name": "My Facebook Page",
  "published": true,
  "uid": "111111111",
  "updated_at": "2013-09-06T01:13:55+02:00",
  "username": "MyFacebookPage",
  "url": "http://facebook.com/MyFacebookPage",
  "token_status": "valid"
}
```

Available types are `PubAccounts::FacebookWall`, `PubAccounts::Twitter`, `PubAccounts::Youtube`.

### Routes 

#### Listing Client's PubAccounts

`GET /api/clients/:client_id/pub_accounts`

#### Listing Projects's PubAccounts

`GET /api/clients/:client_id/projects/:project_id/pub_accounts`


*Optional params*
* limit - number of projects returned
* page  - page number


#### Getting a PubAccount

`GET /api/clients/:client_id/projects/:project_id/pub_accounts/:pub_account_id`

