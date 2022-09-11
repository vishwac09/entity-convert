<?php

namespace DrupalUtils\EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use DrupalUtils\EntityConvert\Entity\User;
use DrupalUtils\EntityConvert\EntityConvert;
use DrupalUtils\EntityConvertTest\Entity\Mock\Entity;

class UserTest extends TestCase {

  public function testFieldSingleValue() {
    $user = new User();
    $this->assertTrue($user->isSingleValued('uid'));
    $this->assertTrue($user->isSingleValued('status'));
    $this->assertTrue($user->isSingleValued('name'));
    $this->assertFalse($user->isSingleValued('email'));
  }

  public function testUserMockObject() {
    $mockedUserInstance = new Entity('user', 'uid');
    $sea = new EntityConvert();
    $parsedUser = $sea->toArray($mockedUserInstance);
    $this->assertArrayHasKey('uid', $parsedUser);
    $this->assertSame(PHP_INT_MAX, $parsedUser['uid']);
  }
}
