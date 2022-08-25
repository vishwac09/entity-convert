<?php

namespace SimpleEntities\FieldTypes;

/**
 * Group of reference category fields.
 */
trait Reference {

  /**
   * Resolver for field having type as EntityReference.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return 
   */
  public function get_entity_reference($value) {
    return $value['target_id'];
  }
  
  /**
   * Resolver for field having type as File.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return mixed
   */
  public function get_file($value) {
    return $value;
  }

  /**
   * Resolver for field having type as Image.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return mixed
   */
  public function get_image($value) {
    return $value;
  }
}
