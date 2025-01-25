# JsonModifier

**JsonModifier** is a PHP package designed to assist developers in manipulating JSON files. It offers a range of operations, including data lookup, reading, adding, deleting, and updating JSON data.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
  - [Retrieving Data](#retrieving-data)
  - [Updating Data](#updating-data)
  - [Adding Data](#adding-data)
  - [Searching Data](#searching-data)
- [Contributing](#contributing)
- [License](#license)

## Installation

Install the package via Composer:

```bash
composer require jsonmodifier/json
```

## Usage

First, include the Composer autoload file and create a new instance of `JsonModifier` by providing the path to your JSON file:

```php
require 'vendor/autoload.php';

use PhpJsonModifier\JsonModifier;

$json = new JsonModifier('path/to/your/jsonfile.json');
```

### Retrieving Data

To retrieve all data from a specific index:

```php
$data = $json->index('items')->get();
```

### Updating Data

To update specific fields where a condition is met:

```php
$update = $json->index('items')->update(
    ['id', '3'], // Condition: WHERE id = 3
    [
        ['unitprice' => '224.50'],
        ['color' => '#fff']
    ]
);
```

### Adding Data

To add a new item to the JSON file:

```php
$add = $json->index('items')->add([
    "id" => "10",
    "name" => "black shirt",
    "unitprice" => "150.00"
]);
```

### Searching Data

To search for items matching specific criteria:

```php
$search = $json->index('items')->search(['id' => '2'])->get();
```

To retrieve the first item that matches the criteria:

```php
$search = $json->index('items')->search(['id' => '2'])->first();
```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your proposed changes. Ensure that your code adheres to the project's coding standards and includes appropriate tests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

*Note: Ensure that your JSON files are properly formatted to prevent errors. Here's an example of a valid JSON structure:*

```json
[
    {
        "items": [
            {
                "id": "1",
                "name": "original t-shirt",
                "unitprice": "240.00"
            },
            {
                "id": "2",
                "name": "Cotton Polo Shirt",
                "unitprice": "123.00"
            }
        ]
    }
]
```
