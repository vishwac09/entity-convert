<?php

namespace DrupalUtils\EntityConvert\FieldTypes;

/**
 * Group of general category fields.
 */
trait General {

  /**
   * Resolver for field having type as Boolean.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return bool
   */
  public function get_boolean($value) {
    return $this->preserveType ? (bool) $value['value'] : $value['value'];
  }

  /**
   * Resolver for field having type as Comment.
   * 
   * @param array $value
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
   * @param array $value
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
   * @param array $value
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
   * @param array $value
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
   * @param array $value
   *   The value of the field.
   *
   * @return int
   */
  public function get_timestamp($value) {
    return $value['value'];
  }
}
