# Projects

### Example Project

```json
{
  "_type": "Project",
  "client_id": "5bb5c26bacb93e792f000007",
  "countries": ["United States"],
  "created_at": "2013-09-11T16:01:41+02:00",
  "credits": [{
    "_id": "523077a5873b0c4a1f007804",
    "job": "actor",
    "name": "An Actor",
    "role": ""
  }, {
    "_id": "523077a5873b0c4a1f007805",
    "job": "actor",
    "name": "Another Actor",
    "role": ""
  }],
  "default_image_id": "52308f37873b0c1a75007be6",
  "default_video_id": "52308f37873b0c1a75007be9",
  "featured_image_id": "52308f37873b0c1a75007be7",
  "genres": ["Aventure", "Animation"],
  "homepage": "http://url.to/homepage",
  "original_title": "My Original Title",
  "project_category_id": '52308f37873b0a4b75001be9',
  "published": true,
  "release_date": "2014-10-15",
  "slug": "my-project",
  "stylesheet_url": "",
  "synopsis": "This is a description",
  "tags": [],
  "title": "My Project",
  "updated_at": "2013-09-11T17:58:32+02:00",
  "links": [],
  "category_name": "A Category",
  "id": "523077c5893b0c9a1f007803"
}
```

### Routes 

#### Listing Projects

`GET /api/clients/:client_id/projects`

*Optional params*
* limit - number of projects returned
* page  - page number

#### Creating a Project

`POST /api/clients/:client_id/projects`

#### Updating a Project

`PUT /api/clients/:client_id/projects/:project_id`
