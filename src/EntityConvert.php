<?php

namespace DrupalUtils\EntityConvert;

use DrupalUtils\EntityConvert\Entity\File;
use DrupalUtils\EntityConvert\Entity\Node;
use DrupalUtils\EntityConvert\Entity\Taxonomy;
use DrupalUtils\EntityConvert\Entity\User;
use DrupalUtils\EntityConvert\Entity\EntityInterface;
use DrupalUtils\EntityConvert\Exception\EntityConvertException;

/**
 * Helper class which simplifies access Entity objects fields & values. 
 */
final class EntityConvert {

  /**
   * Default constructor.
   */
  function __construct() {}

  /**
   * Flag which denotes if we have to preserve the datatype
   * of a field or not. All the field value are returned as string,
   * if set to true code will implicitly typecast it.
   * 
   * @var Bool $strict_type
   *   Typecast values or not.
   */
  protected $strict_type;

  /**
   * Parse the given entity instance.
   *
   * @param Object $instance
   *   The Entity instance to parse.
   *
   * @return EntityInterface
   *   Instance of \EntityConvert\Entity\EntityInterface
   * 
   * @throws EntityConvertException if unable to parse
   */
  protected function parse($instance = null) {
    if (!isset($instance)) {
      return null;
    }
    try {
      $obj = $this->parseInstance($instance->getEntityTypeId());
      return $obj->parse($instance, $this->strict_type);
    }
    catch (\Exception $e) {
      throw new EntityConvertException(
        'Unable to parse the passed Entity instance.'
      );
    }
  }

  /**
   * Function determines the type of instance and parses it.
   * 
   * @param string $type
   *   The Entity instance to parse.
   *
   * @return EntityInterface
   *   Instance of \EntityConvert\Entity\EntityInterface
   *
   * @throws EntityConvertException if invalid argument type
   */
  protected function parseInstance($type) {
    // @todo remove this when php8.0 to match expression.
    switch($type) {
      case 'node':
        return new Node();
        break;
      case 'taxonomy_term':
        return new Taxonomy();
        break;
      case 'user':
        return new User();
        break;
      case 'file':
        return new File();
        break;
      default:
        throw new EntityConvertException(
          'Invalid Entity type passed, accepted node, file, taxonomy and user.'
        );
    }
  }

  /**
   * Parse the given entity instance.
   *
   * @param Object $instance
   *   The Entity instance to parse.
   * @param Boolean $strict_type
   *   Flag indicating variable types should be preserved.
   *
   * @return array
   */
  public function toArray($instance = null, $strict_type = false) {
    $this->strict_type = $strict_type;
    $parsedInstance = $this->parse($instance);
    return $parsedInstance->toArray();
  }

  /**
   * Parse the given entity instance.
   *
   * @param Object $instance
   *   The Entity instance to parse.
   * @param Boolean $strict_type
   *   Flag indicating variable types should be preserved.
   *
   * @return EntityInterface
   */
  public function toObject($instance = null, $strict_type = false) {
    $this->strict_type = $strict_type;
    return $this->parse($instance);
  }
}