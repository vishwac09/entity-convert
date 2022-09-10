<?php

namespace EntityConvert\Entity;

use EntityConvert\FieldTypes\Fields;

/**
 * Handler for the Node Entity type.
 */
abstract class BaseEntity implements EntityInterface {

  /**
   * Default constructor.
   */
  function __construct() {}

  /**
   * @var array $resolvedEntity
   *   Reference to the resolved object.
   */
  protected $resolvedEntity;

  /**
   * @var \EntityConvert\FieldTypes\FieldTypes $fieldTypes
   *   Instance of the FieldTypes.
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
   * @param Boolean $strict_type
   *   Flag indicating variable types should be preserved.
   * 
   * @return \EntityConvert\FieldTypes\FieldTypes
   */
  private function getFieldTypesInstance($strict_type = false) {
    return new Fields($strict_type);
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
  public function parse($instance, $strict_type = false) {
    $fields = $instance->getFields();
    $this->fieldTypes = $this->getFieldTypesInstance($strict_type);
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
      $field_def = $fieldTypeInstance->getFieldDefinition();
      
      $type = $field_def->getType();
      if ($type == 'entity_reference') {
        $setting_type = $field_def->getFieldStorageDefinition()->getSettings();
        return $this->fieldTypes->{'get_' . strtolower($type)}($fieldTypeInstance->getValue(), $setting_type);
      }
      else {
        return $this->fieldTypes->{'get_' . strtolower($type)}($fieldTypeInstance->getValue());
      }
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
        $field_def = $fieldTypeInstance->getFieldDefinition();
        $setting_type = $field_def->getFieldStorageDefinition()->getSettings();
        $type = $field_def->getType();
        // @todo render associated entities.
        if ($type == 'entity_reference') {
          $value[$iterator->key()] = $this->fieldTypes->{'get_' . strtolower($type)}($fieldTypeInstance->getValue(), $setting_type);
        }
        else {
          $value[$iterator->key()] = $this->fieldTypes->{'get_' . strtolower($type)}($fieldTypeInstance->getValue());
        }
      }
      $iterator->next();
    }
    return $value;
  }

  /**
   * @{inheritdoc}
   */
  public function toArray() {
    return $this->resolvedEntity;
  }
}
