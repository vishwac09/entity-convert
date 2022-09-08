<?php

namespace EntityToArray\Entity;

/**
 * Base class structure for all Drupal Entity Types. 
 */
interface EntityInterface {  
  /**
   * Parse the passed Entity instance.
   * 
   * @param Object instance
   *   The Entity instance to parse.
   * 
   * @return mixed
   */
  public function parse($instance);

  /**
   * Parse the passed Field instance.
   * 
   * @param string $name
   *   Name of the field.
   * @param Object $field
   *   The field instance to parse.
   * 
   * @return mixed
   */
  public function parseField($name, $field);

  /**
   * Resolve the value from default field Values.
   * 
   * @param Object|array $fieldItemList
   *   The value of the field.
   * 
   * @return string|array
   *   
   */
  public function resolveDefaultFields($fieldItemList);

  /**
   * Resolve the value from field Values.
   * 
   * @param mixed|array $fieldItemList
   *   The value of the field.
   * 
   * @return array
   *   
   */
  public function resolveFields($fieldItemList);

  /**
   * Return the resolved list of data types.
   * 
   * @return array
   */
  public function toArray();
}
