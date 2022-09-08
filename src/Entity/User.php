<?php

namespace EntityToArray\Entity;

/**
 * Handler for the User Entity type.
 */
class User extends BaseEntity {

  /**
   * Default constructor
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * @{inheritdoc}
   */
  public function isSingleValued($name) {
    return in_array($name, [
        'uid',
        'uuid',
        'preferred_langcode',
        'langcode',
        'preferred_admin_langcode',
        'name',
        'pass',
        'mail',
        'timezone',
        'status',
        'created',
        'changed',
        'access',
        'login',
        'init',
        'roles',
        'default_langcode'
      ]
    );
  }

}
