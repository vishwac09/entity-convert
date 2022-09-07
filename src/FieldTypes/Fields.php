<?php

namespace EntityDecompose\FieldTypes;

/**
 * Collection of Default Field type which drupal ships with.
 */
class Fields {

  use General;
  use Number;
  use Reference;
  use Text;
  
  /**
   * Flag which denotes if we have to preserve the datatype
   * of a field or not. All the field value are returned as string,
   * if set to true code will implicitly typecast it.
   * 
   * @var Bool $preserveType
   *   Typecast values or not.
   */
  protected $preserveType;

  /**
   * Magic method to return the resolved value.
   * 
   * @return mixed
   */
  public function __call($name, $arguments) {
    return $arguments;
  }

  /**
   * Default constructor
   * 
   * @param Bool $preserveType
   *   Typecast values or not.
   */
  function __construct($preserveType = false) {
    $this->preserveType = $preserveType;
  }

  /**
   * Resolver for field having type as changed.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_changed($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as created.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_created($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as language.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_language($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as password.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_password($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as path.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return array
   */
  public function get_path($value) {
    return $value;
  }

  /**
   * Resolver for field having type as string.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return string
   */
  public function get_string($value) {
    return $value['value'];
  }

  /**
   * Resolver for field having type as uuid.
   * 
   * @param array $value
   *   The value of the field.
   * 
   * @return string
   */
  public function get_uuid($value) {
    return $value['value'];
  }
}
