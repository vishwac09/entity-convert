<?php

namespace SimpleEntitiesTest\Entity;

use PHPUnit\Framework\TestCase;

use \SimpleEntities\Entity\User;
use \SimpleEntities\SimpleEntityAccess;

class UserTest extends TestCase {

  public function testFieldSingleValue() {
    $user = new User();
    $this->assertTrue($user->isSingleValued('uid'));
    $this->assertTrue($user->isSingleValued('status'));
    $this->assertTrue($user->isSingleValued('name'));
    $this->assertFalse($user->isSingleValued('email'));
  }

  public function testUserMockObject() {
    $mockedUserInstance = new MockEntity('user', 'uid');
    $sea = new SimpleEntityAccess();
    $parsedUser = $sea->parse($mockedUserInstance);
    $this->assertArrayHasKey('uid', $parsedUser);
    $this->assertSame(PHP_INT_MAX, $parsedUser['uid']);
  }
}
