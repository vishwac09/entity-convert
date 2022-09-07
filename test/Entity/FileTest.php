<?php

namespace EntityDecomposeTest\Entity;

use PHPUnit\Framework\TestCase;

use \EntityDecompose\Entity\File;
use \EntityDecompose\EntityDecomposeAccess;

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
    $sea = new EntityDecomposeAccess();
    $parsedFile = $sea->parse($mockedFileInstance);
    $this->assertArrayHasKey('fid', $parsedFile);
    $this->assertSame(PHP_INT_MAX, $parsedFile['fid']);
  }
}
