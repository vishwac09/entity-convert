<?php

namespace SimpleEntities\FieldTypes;

/**
 * Group of number category fields.
 */
trait Number {

  /**
   * Resolver for field having type as Decimal.
   * 
   * @param array $value
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
   * @param array $value
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
   * @param array $value
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
   * @param array $value
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
   * @param array $value
   *   The value of the field.
   *
   * @return int
   */
  public function get_list_integer($value) {
    return $this->preserveType ? (int) $value['value'] : $value['value'];
  }
}
