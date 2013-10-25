# User Accounts

### Example User Account

```json
{
  "id": "5261502e09e50d74c6000002",
  "email": "example@example.com",
  "name": "Example User",
  "picture": "http://graph.facebook.com/11111111111/picture?type=square",
  "facebook": {
    "email": "example@example.com",
    "name": "Example User",
    "picture": "http://graph.facebook.com/11111111111/picture?type=square",
    "uid": "11111111111",
    "username": "my.user.name"
  },
  "created_at": "2013-10-18T17:13:50+02:00",
}
```

### Routes

#### Getting a User Account by its ID

GET /api/v1/clients/:client_id/accounts/:account_id

