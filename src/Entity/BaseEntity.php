<?php

namespace SimpleEntities\Entity;

use SimpleEntities\FieldTypes\Fields;

/**
 * Handler for the Node Entity type.
 */
abstract class BaseEntity implements EntityInterface {

  /**
   * Default constructor.
   */
  function __construct($render_child = true) {
    $this->render_child = $render_child;
  }

  /**
   * @var array $resolvedEntity
   *   Reference to the resolved object.
   */
  protected $resolvedEntity;

  /**
   * @var \SimpleEntities\FieldTypes\FieldTypes $fieldTypes
   *   Instance of the FieldTypes.
   */
  protected $fieldTypes;

  /**
   * @var Boolean $render_child
   *   Flag representing to render child entities.
   */
  protected $render_child;

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
      $field_def = $fieldTypeInstance->getFieldDefinition();
      $setting_type = $field_def->getFieldStorageDefinition()->getSettings();
      $type = $field_def->getType();
      if ($type == 'entity_reference') {
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
