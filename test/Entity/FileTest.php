<?php

namespace DrupalUtils\EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use DrupalUtils\EntityConvert\Entity\File;
use DrupalUtils\EntityConvert\EntityConvert;
use DrupalUtils\EntityConvertTest\Entity\Mock\Entity;

class FileTest extends TestCase {

  public function testFieldSingleValue() {
    $file = new File();
    $this->assertTrue($file->isSingleValuedField('fid'));
    $this->assertTrue($file->isSingleValuedField('uri'));
    $this->assertTrue($file->isSingleValuedField('uuid'));
    $this->assertFalse($file->isSingleValuedField('name'));
  }

  public function testFileMockObject() {
    $mockedFileInstance = new Entity('file', 'fid');
    $ec = new EntityConvert();
    $parsedFile = $ec->toArray($mockedFileInstance);
    $this->assertArrayHasKey('fid', $parsedFile);
    $this->assertSame(PHP_INT_MAX, $parsedFile['fid']);
  }
}
