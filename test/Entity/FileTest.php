<?php

namespace SimpleEntitiesTest\Entity;

use PHPUnit\Framework\TestCase;

use \SimpleEntities\Entity\File;
use \SimpleEntities\SimpleEntityAccess;

class FileTest extends TestCase {

  public function testFieldSingleValue() {
    $file = new File();
    $this->assertTrue($file->isSingleValued('fid'));
    $this->assertTrue($file->isSingleValued('uri'));
    $this->assertTrue($file->isSingleValued('uuid'));
    $this->assertFalse($file->isSingleValued('name'));
  }

  public function testFileMockObject() {
    $mockedFileInstance = new MockEntity('file', 'fid');
    $sea = new SimpleEntityAccess();
    $parsedFile = $sea->parse($mockedFileInstance);
    $this->assertSame(PHP_INT_MAX, $parsedFile->fid);
    $this->assertNull($parsedFile->id);
  }
}
