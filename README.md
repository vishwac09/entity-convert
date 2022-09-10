# EntityConvert

PHP Library built to be used with **Drupal** codebase/modules only. **Parses** then simplifies the passed Node/Taxonomy/User/File (drupal entities) fully loaded object's into Simple array of fields which can be consumed directly in any view or to build a rest response.

> I decided to write this library to reduce the need to write custom classes/methods around entities to get value from different types of fields associated with the Entity objects.

---

### Accessing the values 

Consider Entity type "**Node**" having associated the below default field types to it

- Boolean
- Integer
- Decimal
- List Integer / Decimal / Text
- File / Images
- Timestamp / Date
- Link
- Email
- Taxonomy / Content

#### <ins>Drupal way</ins>

```

$node = Node::load(1);

// Accessing the values of BaseFields is easy.

$nid = $node->id();
$title = $node->getTitle();
$type = $node->getType();
$isPromoted = $node->isPromoted();

// Accessing the value of fields associated to the node entity.

$field_boolean_value = $node->get('field_bool_multi_value')->value;
var_dump($field_boolean_value);
string(1) "1"



```