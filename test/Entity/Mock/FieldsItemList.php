<?php

namespace DrupalUtils\EntityConvertTest\Entity\Mock;

class FieldsItemList {
  public function first() {
    return new MockFieldTypeInstance();
  }
}

class MockFieldTypeInstance {
  public function getFieldDefinition() {
    return new MockField();
  }
  public function getValue() {
    return [
      "value" => PHP_INT_MAX
    ];
  }
}

class MockField {
  public function getType() {
    return "integer";
  }
}