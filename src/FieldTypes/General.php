<?php

namespace SimpleEntities\FieldTypes;

/**
 * Group of general category fields.
 */
trait General {

  /**
   * Resolver for field having type as Boolean.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return bool
   */
  public function get_boolean($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as Comment.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return array
   */
  public function get_comment($value) {
    return $value;
  }

  /**
   * Resolver for field having type as Datetime.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_datetime($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as Email.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_email($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as Link.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_link($value) {
    return $value;
  }

  /**
   * Resolver for field having type as Timestamp.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return int
   */
  public function get_timestamp($value) {
    return $value['value'];
  }
}
