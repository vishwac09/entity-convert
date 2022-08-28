# Simplified Entity Objects

PHP Library built to be used with Drupal code base/modules only. Parses then simplifies the passed Node/Taxonomy/U\ser fully loaded object into Simplified array of fields or a simple object which can be used directly in any view or to build a rest response.

> I decided to write this library to reduce the need to write custom classes/methods around entities to get value from different types of fields associated with the Entity objects.

---

### Working

Consider a Node object with following fields associated with it.

- Boolean
- Integer
- Decimal
- List Integer/Decimal/Text

#### <ins>Drupal Way</ins>

```

$node = Node::load(1);

```