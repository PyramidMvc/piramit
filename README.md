# Piramit HTTP

Piramit HTTP is a PHP package that simplifies the process of handling HTTP requests and responses in web applications. It provides an intuitive API for making HTTP requests, managing responses, and handling errors. This package is designed for developers who want to streamline their work with HTTP in PHP.

---

## Installation

You can install the package using Composer. Run the following command in your project’s root directory:

```bash
composer require piramit/http
```

This will download and install the latest version of `piramit/http` into your `vendor` directory.

---

# Requirements

- PHP 7.3 or higher
- Composer
- A web server like Apache or Nginx (for web applications)

---

# Usage

### 1. Sending HTTP Requests
Piramit HTTP provides an easy-to-use interface for sending HTTP requests. You can use it to make `GET`, `POST`, `PUT`, `DELETE`, and other types of requests.

### Example: Sending a GET Request
```php
<?php
use Piramit\Http\Client;

$client = new Client();
$response = $client->get('https://api.example.com/data');

echo $response->getBody();
?>
```

### Explanation:

- This example demonstrates how to send a simple `GET` request to an `API` endpoint.
- We instantiate a new Client object, then use the `get()` method to request data from `https://api.example.com/data`.
- The response body is accessed using `$response->getBody()` and printed to the console.


### Example: Sending a POST Request

```php
<?php
use Piramit\Http\Client;

$client = new Client();
$response = $client->post('https://api.example.com/submit', [
    'json' => [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
    ]
]);

echo $response->getStatusCode();  // 200
echo $response->getBody();        // Response body
?>
```

### Explanation:

- This example demonstrates how to send a `POST` request with `JSON` data.
The `post()` method is used to send data to the `https://api.example.com/submit` endpoint.
- The JSON data (name and email) is included in the request body.
The status code and response body are then printed out using `$response->getStatusCode()` and `$response->getBody()`.

### 2. Handling Responses
You can easily work with the response object returned from the HTTP client. The Response object provides methods for retrieving status codes, headers, and the response body.

### Example: Checking the Status Code
```php
<?php
$response = $client->get('https://api.example.com/data');
if ($response->getStatusCode() == 200) {
    echo 'Request was successful!';
} else {
    echo 'Request failed with status: ' . $response->getStatusCode();
}
?>
```

### Explanation:

- This example shows how to handle the response based on its status code.
- We send a `GET` request, then check if the status code is `200` (successful).
- If successful, we print "Request was successful!" Otherwise, we print the actual status code to help with debugging.

- ### Example: Getting Response Headers
```php
<?php
$response = $client->get('https://api.example.com/data');
$headers = $response->getHeaders();
print_r($headers);
?>
```

### Explanation:

- In this example, we retrieve the headers from the response object using the `getHeaders()` method.
- This can be useful for inspecting additional information about the response, such as C`ontent-Type` or `Authorization` headers.


### 3. Error Handling
Piramit HTTP also provides error handling mechanisms, allowing you to easily manage failed requests or unexpected situations.

### Example: Catching Exceptions
```php
<?php
use Piramit\Http\Exception\RequestException;

try {
    $response = $client->get('https://api.example.com/data');
} catch (RequestException $e) {
    echo 'Request failed: ' . $e->getMessage();
}
?>
```

### Explanation:

- This example demonstrates how to handle errors during HTTP requests.
- If the request fails or there is an issue, a RequestException is thrown.
- The catch block catches the exception and prints the error message, which can help identify the issue (e.g., network issues or invalid responses).


### Features
- **Simple API:** An easy-to-use API for making HTTP requests.
- **Support for All HTTP Methods:** `GET`, `POST`, `PUT`, `DELETE`, and more.
- **Request and Response Handling:** Easily work with HTTP requests and responses, including headers and bodies.
- **Error Handling:** Gracefully handle errors and failed requests.
- **Custom Headers:** Add custom headers to your requests for authentication or other purposes.
- **JSON Support:** Easily send and receive JSON data.

### Example: Full Example of Using Piramit HTTP
```php
<?php
use Piramit\Http\Client;

$client = new Client();

// Send GET request
$response = $client->get('https://api.example.com/data');

// Check if request was successful
if ($response->getStatusCode() == 200) {
    $data = json_decode($response->getBody(), true);
    echo 'Data received: ';
    print_r($data);
} else {
    echo 'Request failed with status: ' . $response->getStatusCode();
}

// Send POST request with JSON data
$response = $client->post('https://api.example.com/submit', [
    'json' => [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
    ]
]);

if ($response->getStatusCode() == 200) {
    echo 'Data successfully submitted.';
} else {
    echo 'Submission failed with status: ' . $response->getStatusCode();
}
?>
```

### Explanation:

- In this full example, we first send a `GET` request and check if the response status is `200`. If successful, we decode the JSON data and print it.
- Then, we send a `POST` request with a JSON payload (`name` and `email`).
The status of both requests is checked and appropriate messages are printed.


### Configuration
There are no complex configurations needed for this package, but you can extend its functionality by adding custom middleware or configuring custom headers for your requests.

### Example: Adding Custom Headers
```php
<?php
$client = new Client();
$response = $client->get('https://api.example.com/data', [
    'headers' => [
        'Authorization' => 'Bearer YOUR_API_TOKEN',
    ]
]);

echo $response->getBody();
?>
```

### Explanation:

- This example demonstrates how to add custom headers to your requests, such as an `Authorization` header.
- The `Authorization` header is often used for token-based authentication, where `YOUR_API_TOKEN` would be replaced with a real token.

### Contributing
We welcome contributions to Piramit HTTP! If you'd like to contribute, please fork the repository and submit a pull request.

### License
This package is open-source and released under the MIT License.

### Contact
For more information, please contact [pyramidmvc@gmail.com].
