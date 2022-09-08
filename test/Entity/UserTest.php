<?php

namespace EntityToArrayTest\Entity;

use PHPUnit\Framework\TestCase;

use \EntityToArray\Entity\User;
use \EntityToArray\EntityToArrayAccess;

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
    $sea = new EntityToArrayAccess();
    $parsedUser = $sea->parse($mockedUserInstance);
    $this->assertArrayHasKey('uid', $parsedUser);
    $this->assertSame(PHP_INT_MAX, $parsedUser['uid']);
  }
}
