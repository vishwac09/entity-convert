<?php

namespace SimpleEntities\FieldTypes;

/**
 * Group of text category fields.
 */
trait Text {

  /**
   * Resolver for field having type as ListString.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_list_string($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as StringLong.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_string_long($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as Text.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_text($value) {
    return $value;
  }

  /**
   * Resolver for field having type as TextLong.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_text_long($value) {
    return $value;
  }

  /**
   * Resolver for field having type as TextWithSummary.
   * 
   * @param mixed $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_text_with_summary($value) {
    return $value;
  }
}
