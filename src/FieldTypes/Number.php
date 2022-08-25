<?php

namespace SimpleEntities\FieldTypes;

/**
 * Group of number category fields.
 */
trait Number {

  /**
   * Resolver for field having type as Decimal.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return float
   */
  public function get_decimal($value) {
    return $this->preserveType ? (float) $value['value'] : $value['value'];
  }

  /**
   * Resolver for field having type as Float.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return float
   */
  public function get_float($value) {
    return $this->preserveType ? (float) $value['value'] : $value['value'];
  }

  /**
   * Resolver for field having type as Integer.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return int
   */
  public function get_integer($value) {
    return $this->preserveType ? (int) $value['value'] : $value['value'];
  }

  /**
   * Resolver for field having type as ListFloat.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return float
   */
  public function get_list_float($value) {
    return $this->preserveType ? (float) $value['value'] : $value['value'];
  }

  /**
   * Resolver for field having type as ListInteger.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return int
   */
  public function get_list_integer($value) {
    return $this->preserveType ? (int) $value['value'] : $value['value'];
  }
}
