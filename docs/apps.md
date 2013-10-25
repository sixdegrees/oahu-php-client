# Apps

### Example App

```json
[{
  "id": "524eeb02873b0c6975006712",
  "_type": "Game",
  "api_token": "xxxxx",
  "authorized_domains": [],
  "canvas_url": "https://path.to/canvas/url",
  "client_id": "5bb5c26bacb93e792f000007",
  "consumer_id": "524eeb02784b0c6975007974",
  "consumer_secret": "xxxxxxx",
  "description": "App Description",
  "starts_at": "2013-10-09T16:20:00+00:00",
  "ends_at": "2013-10-15T15:20:00+00:00",
  "extra": {},
  "homepage": "https://path.to/canvas/url",
  "image_id": "52556e31873b0c6a64013886",
  "name": "My App",
  "project_id": "523077c5893b0c9a1f007803",
  "url": "https://path.to/app/url",
  "players_count": 11229,
  "facebook_app_id": "524ed537722b0c6975007543",
  "facebook_app": {
    "_id": "524ed537722b0c6975007543",
    "name": "A Facebok App",
    "app_id": "111111111111",
    "app_secret": "xxxxxxxxxxxxxxxxxxxx",
    "client_id": "5bb5c26bacb93e792f000007",
    "created_at": "2013-10-04T16:48:18+02:00",
    "updated_at": "2013-10-04T16:48:18+02:00"
  },
  "project_title": "My Project"
}]
```

### Routes 

#### Listing all Apps

`GET /api/clients/:client_id/apps`

#### Listing a Project's Apps

`GET /api/clients/:client_id/projects/:project_id/apps`

*Optional params*
* limit - number of apps returned
* page  - page number

#### Creating an App

`POST /api/clients/:client_id/apps`

#### Creating an on a Project

`POST /api/clients/:client_id/projects/:project_id/apps`

#### Updating an App

`PUT /api/clients/:client_id/apps/:app_id`
