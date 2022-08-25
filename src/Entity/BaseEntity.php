<?php

namespace SimpleEntities\Entity;

use SimpleEntities\FieldTypes\Fields;

/**
 * Handler for the Node Entity type.
 */
abstract class BaseEntity implements EntityInterface {

  /**
   * @var array $resolvedEntity
   *   Reference to the resolved object.
   */
  protected $resolvedEntity;

  /**
   * @var \SimpleEntities\FieldTypes\FieldTypes $fieldTypes
   */
  protected $fieldTypes;

  /**
   * Magic method to return the property value.
   */
  public function __get($name) {
    return $this->resolvedEntity[$name] ?? null;
  }

  /**
   * Return a new Field instance.
   * 
   * @return \SimpleEntities\FieldTypes\FieldTypes
   */
  private function getFieldTypesInstance() {
    return new Fields();
  }

  /**
   * Determine if the field is SingleValued or not.
   * 
   * @param string $name
   *   The name of the field.
   */
  abstract public function isSingleValued($name);

  /**
   * @{inheritdoc}
   */
  public function parse($instance) {
    $fields = $instance->getFields();
    $this->fieldTypes = $this->getFieldTypesInstance();
    foreach ($fields as $name => $field) {
      $this->resolvedEntity[$name] = $this->parseField($name, $field);
    }
    return $this;
  }

  /**
   * @{inheritdoc}
   */
  public function parseField($name, $field) {
    if ($this->isSingleValued($name)) {
      return $this->resolveDefaultFields($field);
    }
    else {
      return $this->resolveFields($field);
    }
  }
  
  /**
   * @{inheritdoc}
   */
  public function resolveDefaultFields($fieldItemList) {
    $fieldTypeInstance = $fieldItemList->first() ?? null;
    if (isset($fieldTypeInstance)) {
      $type = $fieldTypeInstance->getFieldDefinition()->getType();
      return $this->fieldTypes->{'get_' . strtolower($type)}($fieldTypeInstance->getValue());
    }
    return null;
  }

  /**
   * @{inheritdoc}
   */
  public function resolveFields($fieldItemList) {
    $iterator = $fieldItemList->getIterator();
    $value = [];
    while ($iterator->valid()) {
      $fieldTypeInstance = $iterator->current() ??  null;
      if (isset($fieldTypeInstance)) {
        $type = $fieldTypeInstance->getFieldDefinition()->getType();
        $value[$iterator->key()] = $this->fieldTypes->{'get_' . strtolower($type)}($fieldTypeInstance->getValue());
      }
      $iterator->next();
    }
    return $value;
  }
}
