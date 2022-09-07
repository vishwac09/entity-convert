# Simplified Entity Objects

[![Run Test cases on SimpleEntities repository](https://github.com/vishwac09/simple_entities/actions/workflows/simple-entities-run-tests.yml/badge.svg)](https://github.com/vishwac09/simple_entities/actions/workflows/simple-entities-run-tests.yml)

PHP Library built to be used with Drupal code base/modules only. Parses then simplifies the passed Node/Taxonomy/User fully loaded object into Simplified array of fields or a simple object which can be used directly in any view or to build a rest response.

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

#### <ins>Drupal Way</ins>

```

$node = Node::load(1);

```