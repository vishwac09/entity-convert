<?php

namespace DrupalUtils\EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use DrupalUtils\EntityConvert\Entity\User;
use DrupalUtils\EntityConvert\EntityConvert;
use DrupalUtils\EntityConvertTest\Entity\Mock\Entity;

class UserTest extends TestCase {

  public function testFieldSingleValue() {
    $user = new User();
    $this->assertTrue($user->isSingleValuedField('uid'));
    $this->assertTrue($user->isSingleValuedField('status'));
    $this->assertTrue($user->isSingleValuedField('name'));
    $this->assertFalse($user->isSingleValuedField('email'));
  }

  public function testUserMockObject() {
    $mockedUserInstance = new Entity('user', 'uid');
    $ec = new EntityConvert();
    $parsedUser = $ec->toArray($mockedUserInstance);
    $this->assertArrayHasKey('uid', $parsedUser);
    $this->assertSame(PHP_INT_MAX, $parsedUser['uid']);
  }
}
