<?php

namespace EntityDecomposeTest\Entity;

class MockFieldsItemList {
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