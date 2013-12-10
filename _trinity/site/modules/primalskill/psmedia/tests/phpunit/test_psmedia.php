<?php
/**
 * PHPUnit testcase for the psmedia model
 */
class Test_Psmedia extends PHPUnit_Framework_TestCase
{
	private $_m_media = null;
	
	protected function setUp()
	{
		$this->_m_media = new Model_Psmedia('test_psmedia');
	}
	
	/**
	 * We test the validation to fail whenever needed
	 */
	public function testValidationFails()
	{
		// Actually we have the possibility to change some options a file is validated against
		
		$_FILES['photo'] = array();
		$_FILES['photo']['name'] = 'schools.xml';
		$_FILES['photo']['tmp_name'] = 'test_data/schools.xml';
		$_FILES['photo']['type'] = 'application/xml';
		$_FILES['photo']['error'] = 0;
		$_FILES['photo']['size'] = filesize('test_data/schools.xml');
		
		// Pass a wrong validation type
		$this->assertFalse($this->_m_media->validate($_FILES['photo'], 'something'));
		
		$errors = $this->_m_media->return_errors();
		
		$this->assertArrayHasKey('type', $errors);
		
		// Pass valid type but invalid file
		$this->assertFalse($this->_m_media->validate($_FILES['photo'], 'image'));
		
		$errors = $this->_m_media->return_errors();
		
		$this->assertArrayHasKey('type', $errors);
		
		$_FILES['photo'] = array();
		$_FILES['photo']['name'] = 'valid_image.png';
		$_FILES['photo']['tmp_name'] = 'test_data/valid_image.png';
		$_FILES['photo']['type'] = 'image/png';
		$_FILES['photo']['error'] = 0;
		$_FILES['photo']['size'] = filesize('test_data/valid_image.png');
		
		// Valid image, custom options
		$this->assertFalse($this->_m_media->validate($_FILES['photo'], 'image', array('max_upload_size' => '1K')));
		$errors = $this->_m_media->return_errors();
		
		$this->assertArrayHasKey('file', $errors);
		
		$this->assertFalse($this->_m_media->validate($_FILES['photo'], 'image', array('max_upload_size' => '5M', 'sizes' => array('normal' => array()))));
		
		$errors = $this->_m_media->return_errors();

		$this->assertArrayHasKey('size', $errors);
		
		$this->assertFalse($this->_m_media->validate($_FILES['photo'], 'image', array('max_upload_size' => '5M', 'sizes' => array('normal' => array('width' => 4000, 'height' => 4000)))));
		$errors = $this->_m_media->return_errors();
		
		$this->assertArrayHasKey('size', $errors);
	}
	
	/**
	 * We test the validation to pass and the save function
	 */
	public function testGoodSave()
	{
		// We have to test for the 2 kind of media we currently have, the image and text
		$_FILES['file'] = array();
		$_FILES['file']['name'] = 'something.txt';
		$_FILES['file']['tmp_name'] = 'test_data/something.txt';
		$_FILES['file']['type'] = 'text/plain';
		$_FILES['file']['error'] = 0;
		$_FILES['file']['size'] = filesize('test_data/something.txt');
	
		// Pass a wrong validation type
		$this->assertTrue($this->_m_media->validate($_FILES['file'], 'text'));
		
		// Test when it will not be attachaed to an object and add relative path
		$this->assertTrue($this->_m_media->save(null, '', 'a/b'));
		
		// Test when it is attached and also has meta data
		$this->assertTrue($this->_m_media->save(1, 'file', 'a/b', array('test' => 'test')));
		
		$_FILES['file'] = array();
		$_FILES['file']['name'] = 'valid_image.png';
		$_FILES['file']['tmp_name'] = 'test_data/valid_image.png';
		$_FILES['file']['type'] = 'image/png';
		$_FILES['file']['error'] = 0;
		$_FILES['file']['size'] = filesize('test_data/valid_image.png');
	
		// Pass a wrong validation type
		$this->assertTrue($this->_m_media->validate($_FILES['file'], 'image'));
		
		// Test when it will not be attachaed to an object and add relative path
		$this->assertTrue($this->_m_media->save(null, '', 'a/b'));
		
		// Test when it is attached and also has meta data
		$this->assertTrue($this->_m_media->save(1, 'file', 'a/b', array('test' => 'test')));
		
		// Now test the deletion of files from a given path
		$this->assertTrue($this->_m_media->delete_by(array('all' => true, 'path' => 'a/b')));
	}
	
	/**
	 * We test the load function
	 */
	public function testLoad()
	{
		// The load is made in a way where any key -> value pair can be passed, but only given ones will be processed, others will be left aside
		// The function has to return array in every case
		$by = array('object_id' => 3);
		$this->assertTrue(is_array($this->_m_media->load_by($by)));
	}
	
	protected function tearDown()
	{
		$q = DB::query(Database::DELETE, 'DROP TABLE IF EXISTS test_psmedia')->execute();
	}
}