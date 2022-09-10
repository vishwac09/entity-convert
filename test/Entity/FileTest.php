<?php

namespace EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use EntityConvert\Entity\File;
use EntityConvert\EntityConvertAccess;
use EntityConvertTest\Entity\Mock\Entity;

class FileTest extends TestCase {

  public function testFieldSingleValue() {
    $file = new File();
    $this->assertTrue($file->isSingleValued('fid'));
    $this->assertTrue($file->isSingleValued('uri'));
    $this->assertTrue($file->isSingleValued('uuid'));
    $this->assertFalse($file->isSingleValued('name'));
  }

  public function testFileMockObject() {
    $mockedFileInstance = new Entity('file', 'fid');
    $sea = new EntityConvertAccess();
    $parsedFile = $sea->toArray($mockedFileInstance);
    $this->assertArrayHasKey('fid', $parsedFile);
    $this->assertSame(PHP_INT_MAX, $parsedFile['fid']);
  }
}
