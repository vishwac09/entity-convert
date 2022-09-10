# EntityConvert

PHP Library built to be used with **Drupal** codebase/modules only. **Parses** then simplifies the passed Node/Taxonomy/User/File (drupal entities) fully loaded object's into Simple array of fields/Object which can be used directly to build the view layer. We implement helper classes/methods to resolve the field value for a given Entity instance. For custom Entities/Content types we might end up writing multiple helper classes, there by duplicating the code.

> I decided to write this library to reduce the need to write custom helper classes/methods around entities to get value from different types of fields associated with it.

---

## Install

#### Get from Packagist using Composer

1. From the root of your Drupal project run. Link to [Packagist](https://packagist.org/packages/vishwac09/entity-convert)
```bash
$ composer require vishwac09/entity-convert:0.0.1-dev
```


## Usage

Consider Entity type "**Node**" having associated the below default field types to it
- Boolean
- Integer, Decimal
- List Integer / Decimal / Text
- File / Images / Taxonomy / Content
- Timestamp / Date
- Link, Email

#### <ins>Drupal way</ins>

How field value is accessed normally in the code.

```

$node = Node::load(1);
$field_boolean_value = $node->get('field_boolean_value')->value;

// Accessing the values of BaseFields is easy.

$nid = $node->id();
$title = $node->getTitle();
$type = $node->getType();
$isPromoted = $node->isPromoted();

// Accessing the value of fields associated to the node entity.

$field_boolean_value = $node->get('field_bool_multi_value')->value;
var_dump($field_boolean_value);
string(1) "1"

$field_datetime_multi_value = $node->get('field_datetime_multi_value')->value;
var_dump($field_datetime_multi_value);
string(19) "2022-08-31T00:31:28"

$field_date_multi_value = $node->get('field_date_multi_value')->value;
var_dump($field_date_multi_value);
array(2) { [0]=> array(1) { ["value"]=> string(10) "2022-08-14" } [1]=> array(1) { ["value"]=> string(10) "2022-08-31" } }

$field_email_multi_value = $node->get('field_email_multi_value')->value;
var_dump($field_email_multi_value);
array(2) { [0]=> array(1) { ["value"]=> string(24) "test@abc.com" } [1]=> array(1) { ["value"]=> string(25) "test@def.com" } }

$field_file_multi_value = $node->get('field_file_multi_value')->value;
var_dump($field_file_multi_value);
array(1) { [0]=> array(3) { ["target_id"]=> string(1) "3" ["display"]=> string(1) "1" ["description"]=> string(8) "CSV File" } } 

$field_file_multi_value = $node->get('field_file_multi_value')->referencedEntities();
var_dump($field_file_multi_value);
array(1) { [0]=> object(Drupal\file\Entity\File) }

$field_listtext_multi_value = $node->get('field_listtext_multi_value)->getValue();
var_dump($field_listtext_multi_value);
array(2) { [0]=> array(1) { ["value"]=> string(5) "apple" } [1]=> array(1) { ["value"]=> string(4) "ball" } } 
```

#### <ins>Using the library</ins>

```
<?php

use Drupal\node\Entity\Node;
// Include the library.
use EntityConvert\EntityConvertAccess;

$node = Node::load(1);

// Creating a new Instance.
$entityConvert = new EntityConvertAccess();

// Pass on the Node object to get the parsed value as array.
$parsedNode = $entityCovert->toArray($node, false);
```

#### Get response as array of field => values

```
// Pass on the Node object to get the parsed value as array.
$parsedNode = $entityCovert->toArray($node, false);

var_dump($parsedNode);

^ array:42 [▼
  "nid" => 1
  "uuid" => "8270a03c-a95f-4033-84a7-361597b581a9"
  "vid" => 39
  "langcode" => "en"
  "type" => 0
  "revision_timestamp" => 1660994564
  "revision_uid" => 1
  "revision_log" => null
  "status" => true
  "uid" => 1
  "title" => "Car 1"
  "created" => 1659367826
  "changed" => 1660994564
  "promote" => true
  "sticky" => true
  "default_langcode" => true
  "revision_default" => true
  "revision_translation_affected" => true
  "path" => array:3 [▶]
  "field_bool_multi_value" => array:1 [▼
    0 => true
  ]
  "field_comments_single_value" => array:1 [▶]
  "field_content_multi_value" => array:1 [▶]
  "field_datetime_multi_value" => array:1 [▼
    0 => "2022-08-31T00:31:28"
  ]
  "field_date_multi_value" => array:2 [▼
    0 => "2022-08-14"
    1 => "2022-08-31"
  ]
  "field_email_multi_value" => array:2 [▼
    0 => "vishwa.chikate@gmail.com"
    1 => "vishwa.chikate@srijan.net"
  ]
  "field_file_multi_value" => array:1 [▼
    0 => array:11 [▼
      "fid" => "3"
      "uuid" => "6eb73b6e-be50-449e-a57d-bccf9d6b0bc0"
      "langcode" => "en"
      "uid" => "1"
      "filename" => "testing.csv"
      "uri" => "public://2022-08/testing.csv"
      "filemime" => "text/csv"
      "filesize" => "96"
      "status" => "1"
      "created" => "1660992978"
      "changed" => "1660993028"
    ]
  ]
  "field_image_multi_value" => array:1 [▶]
  "field_link_multi_value" => array:1 [▼
    0 => array:3 [▶]
  ]
  "field_listint_multi_value" => array:1 [▶]
  "field_listtext_multi_value" => array:2 [▶]
  "field_list_multi_value" => array:1 [▶]
  "field_numberfloat_multi_value" => array:1 [▶]
  "field_numberint_multi_value" => array:1 [▶]
  "field_number_multi_value" => array:1 [▶]
  "field_taxonomyterm_multi_value" => array:1 [▶]
  "field_textflws_multi_value" => array:1 [▶]
]

```

#### Get response as an object

If the response is an object, all available fields/values can be accessed as a property.
```
// Pass on the Node object to get the parsed value as array.
$parsedNode = $entityCovert->toObject($node, false);

var_dump($parsedNode->nid);
int(1)

var_dump($parsedNode->title);
string(5) "Car 1"

var_dump($parsedNode->field_file_multi_value);
array(1) { [0]=> array(11) { ["fid"]=> string(1) "3" ["uuid"]=> string(36) "6eb73b6e-be50-449e-a57d-bccf9d6b0bc0" ["langcode"]=> string(2) "en" ["uid"]=> string(1) "1" ["filename"]=> string(40) "testing.csv" ["uri"]=> string(57) "public://2022-08/testing.csv" ["filemime"]=> string(8) "text/csv" ["filesize"]=> string(2) "96" ["status"]=> string(1) "1" ["created"]=> string(10) "1660992978" ["changed"]=> string(10) "1660993028" } } 
```

### API

The methods toArray/toObject (instance, strict_type) accepts 2 arguments.
    
    - instance = Loaded instance object of type Node/User/Taxonomy/File.
    - strict_type = Returned response has all data types preserved.

When we get value from field attached to an Entity, drupal will usually return a string. Sending second parameter as true, the library will typecast all the value to correct data type.

```
use EntityConvert\EntityConvertAccess;

$entityConvert = new EntityConvertAccess();

// The toArray method accepts 2 arguments.

/**
   * Parse the given entity instance.
   *
   * @param Object $instance
   *   The Entity instance to parse.
   * @param Boolean $strict_type
   *   Flag indicating variable types should be preserved.
   *
   * @return array
   */
function toArray($instance, $strict_type = false);

// The toObject method accepts 2 arguments.

/**
   * Parse the given entity instance.
   *
   * @param Object $instance
   *   The Entity instance to parse.
   * @param Boolean $strict_type
   *   Flag indicating variable types should be preserved.
   *
   * @return EntityInterface
   */
  public function toObject($instance = null, $strict_type = false)


```