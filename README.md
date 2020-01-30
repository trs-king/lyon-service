# Programming task for LYON Future
Develop a rest-based HTTP service for doing various queries on the XML dataset.

## Installation

Clone the repository or Download the zip file and extract.

```bash
$ git clone https://github.com/trs-king/lyon-service.git
```

Run composer to install.

```bash
$ composer install
```

## Run the web server

If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command. This command will start a development server at http://localhost:8000

```bash
$ php artisan serve
```

## Postman Collection

You can import the postman collection file `lyon_postman_collection.json` located in the root folder or you
can import the raw text below.

```bash
{
    "info": {
        "_postman_id": "d7f84481-370a-43e7-ba58-ed6c6f31b8d6",
        "name": "LYONService",
        "schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
    },
    "item": [
        {
            "name": "getById",
            "request": {
                "method": "GET",
                "header": [],
                "url": {
                    "raw": "http://lyon-service.build/api/getById/9956/0500509211",
                    "protocol": "http",
                    "host": [
                        "lyon-service",
                        "build"
                    ],
                    "path": [
                        "api",
                        "getById",
                        "9956",
                        "0500509211"
                    ]
                },
                "description": "Develop a service (method) for returning one entity from the dataset based on id. Id in the dataset is the value of the /root/businesscard/participant/@value. Format of the id is <ICD>:<business number>. E.g value=\"9908:918039899” means ICD 9908 (which is Norway) and 918039899 which is the enterprise number for a company called GULENG AS.  \nParameters: \nInput: 2 parameters ICD and enterprise number Output: Business card for the enterprise as a JSON."
            },
            "response": []
        },
        {
            "name": "searchByName",
            "request": {
                "method": "GET",
                "header": [],
                "url": {
                    "raw": "http://lyon-service.build/api/searchByName/Uptime",
                    "protocol": "http",
                    "host": [
                        "lyon-service",
                        "build"
                    ],
                    "path": [
                        "api",
                        "searchByName",
                        "Uptime"
                    ]
                },
                "description": "Develop a service (method) for retuning a list of entities from the dataset based on a name search. The service shall search in the dataset and return a list of matches. “Name” is located in the dataset at the element /root/businesscard/ entity/name/@name. This service must do a wildcard search for names. E.g. if “CAR” is the input “SUPER CARS”, “CAR WASH” AND “CARLINGS” will result in a hit.  \nParameters: \nInput: Name to search for \nOutput: JSON containing Name, Enterprise number and country code.  "
            },
            "response": []
        },
        {
            "name": "getByName",
            "request": {
                "method": "GET",
                "header": [],
                "url": {
                    "raw": "http://lyon-service.build/api/getByName/Uptime ICT",
                    "protocol": "http",
                    "host": [
                        "lyon-service",
                        "build"
                    ],
                    "path": [
                        "api",
                        "getByName",
                        "Uptime ICT"
                    ]
                },
                "description": "A service similar to getById. This service shall return one business card from the dataset based on an exact match in the tag /root/businesscard/entity/name/ @name\nParameters: \nInput: Name to search for \nOutput: JSON representing the value in one /root/businesscard/."
            },
            "response": []
        }
    ],
    "protocolProfileBehavior": {}
}
```