## Description
API for Documents

## Requirements
- PHP ^7.2
- MySQL
- **[Composer](https://getcomposer.org/)**
- **[Docker](https://www.docker.com/)**
- **[Postman](https://www.postman.com/)** or **[cURL](https://curl.se/)**

## Setup
````
$ make setup
````

## Launch local
Server will be available at http://localhost
````
$ make start
````

## Usage
Get all documents
````
$ curl localhost/api/v1/documents | json_pp
````

Get one document
````
$ curl localhost/api/v1/documents/{id} | json_pp
````

Create draft
````
$ curl -X POST localhost/api/v1/documents | json_pp
````

Publish document
````
curl -X POST localhost/api/v1/documents/{id}/publish | json_pp
````

Update draft
````
curl -X POST localhost/api/v1/documents/{id} | json_pp
````
