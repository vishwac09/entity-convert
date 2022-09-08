# EntityToArray

PHP Library built to be used with Drupal codebase/modules only. **Parses** then simplifies the passed Node/Taxonomy/User/File (Drupal entities) fully loaded object into Simple array of fields which can be used directly in any view or to build a rest response.

> I decided to write this library to reduce the need to write custom classes/methods around entities to get value from different types of fields associated with the Entity objects.

---

### Concept

Consider a Node object with following fields associated with it.

- Boolean
- Integer
- Decimal
- List Integer/Decimal/Text
- File/Images
- Timestamp/Date
- Link
- Email
- ...

#### <ins>Drupal Way</ins>

```

$node = Node::load(1);
$field_boolean_value = $node->get('field_boolean_value')->value;

```