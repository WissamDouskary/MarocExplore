# API Documentation

This document provides comprehensive information about the endpoints available in our API. The API is built using Laravel and provides functionality for user authentication, itinerary management, destination management, and favorites.

## Base URL

All URLs referenced in the documentation have the following base:

```
https://your-api-domain.com/api
```

## Authentication

The API uses Laravel Sanctum for authentication. To access protected routes, include the bearer token in the Authorization header:

```
Authorization: Bearer YOUR_API_TOKEN
```

## Endpoints

### User Authentication

#### Register

```
POST /register
```

Create a new user account.

**Request Body:**
```json
{
  "name": "string",
  "email": "string",
  "password": "string",
}
```

**Response:**
```json
{
  "user": {
    "id": "integer",
    "name": "string",
    "email": "string",
    "created_at": "datetime",
    "updated_at": "datetime"
  },
  "token": "string"
}
```

#### Login

```
POST /login
```

Authenticate a user and get a token.

**Request Body:**
```json
{
  "email": "string",
  "password": "string"
}
```

**Response:**
```json
{
  "user": {
    "id": "integer",
    "name": "string",
    "email": "string",
    "created_at": "datetime",
    "updated_at": "datetime"
  },
  "token": "string"
}
```

#### Logout

```
POST /logout
```

Invalidate the current authentication token.

**Authentication required:** Yes

**Response:**
```json
{
  "message": "Logged out successfully"
}
```

### Itineraries

#### List Itineraries

```
GET /itineraries
```

Get a list of all itineraries.

**Authentication required:** No

**Response:**
```json
{
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
    "destinations": [
        {
            "name": "string",
            "lodging": "string",
            "places_to_visit": [
                "string",
                "string"
            ]
        },
    ]
}
```

#### Get Itinerary

```
GET /itineraries/{id}
```

Get a specific itinerary by ID.

**Authentication required:** No

**Parameters:**
- `id` (path): The ID of the itinerary

**Response:**
```json
{
    "id" : "integer",
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
    "destinations": [
        {
            "name": "string",
            "lodging": "string",
            "places_to_visit": [
                "string",
                "string"
            ]
        },
    ]
}
```

#### Search Itineraries

```
GET /itineraries/search/{name}
```

Search for itineraries by name.

**Authentication required:** No

**Parameters:**
- `name` (path): The search query

**Response:**
```json
[
{
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
    "destinations": [
        {
            "name": "string",
            "lodging": "string",
            "places_to_visit": [
                "string",
                "string"
            ]
        },
    ]
}
]
```

#### Create Itinerary

```
POST /itineraries
```

Create a new itinerary.

**Authentication required:** Yes

**Request Body:**
```json
{
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
    "destinations": [
        {
            "name": "string",
            "lodging": "string",
            "places_to_visit": [
                "string",
                "string"
            ]
        },
    ]
}
```

**Response:**
```json
{
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
}
```

#### Update Itinerary

```
PUT /itineraries/{id}
```

Update an existing itinerary.

**Authentication required:** Yes

**Parameters:**
- `id` (path): The ID of the itinerary to update

**Request Body:**
```json
{
  "name": "string",
  "description": "string"
}
```

**Response:**
```json
{
    "id": "integer",
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
    "created_at": "datetime",
    "updated_at": "datetime"
}
```

#### Delete Itinerary

```
DELETE /itineraries/{id}
```

Delete an itinerary.

**Authentication required:** Yes

**Parameters:**
- `id` (path): The ID of the itinerary to delete

**Response:**
```json
{
  "message": "Itinerary deleted successfully"
}
```

### Destinations

#### Add Destination

```
POST /itineraries/{id}/destinations
```

Add a destination to an itinerary.

**Authentication required:** Yes

**Parameters:**
- `id` (path): The ID of the itinerary

**Request Body:**
```json
{
    "name": "test",
    "lodging": "test",
    "places_to_visit": [
        "test",
        "test"
    ],
    "itenerary_id" : "integer"
}
```

**Response:**
```json
{
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
    "destinations": [
        {
            "name": "string",
            "lodging": "string",
            "places_to_visit": [
                "string",
                "string"
            ]
        },
    ]
}
```

#### Delete Destination

```
DELETE /destinations/{id}
```

Delete a destination.

**Authentication required:** Yes

**Parameters:**
- `id` (path): The ID of the destination to delete

**Response:**
```json
{
  "message": "Destination deleted successfully"
}
```

### Favorites

#### Add to Favorites

```
POST /itineraries/{id}/favorite
```

Add an itinerary to the user's favorites.

**Authentication required:** Yes

**Parameters:**
- `id` (path): The ID of the itinerary to favorite

**Response:**
```json
{
  "message": "Itinerary added to favorites",
  "favorite": {
    {
    "title": "string",
    "categorie": "string",
    "duration": "string",
    "image": "string",
    "destinations": [
        {
            "name": "string",
            "lodging": "string",
            "places_to_visit": [
                "string",
                "string"
            ]
        },
    ]
}
  }
}
```

## Error Responses

All endpoints may return the following error responses:

### 401 Unauthorized

```json
{
  "message": "Unauthenticated."
}
```

### 403 Forbidden

```json
{
  "message": "You do not have permission to access this resource."
}
```

### 404 Not Found

```json
{
  "message": "Resource not found."
}
```

### 422 Validation Error

```json
{
  "message": "The given data was invalid.",
  "errors": {
    "field_name": [
      "Error message"
    ]
  }
}
```

### 500 Server Error

```json
{
  "message": "Server error."
}
```
