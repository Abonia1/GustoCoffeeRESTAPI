<?php

class Welcome_test extends \PHPUnit\Framework\TestCase
{
	public function test_index()
	{
		$output = $this->request('GET', ['welcome','index']);
		echo $this->assertContains('<title>Welcome to CodeIgniter</title>', $output);

	}

	public function test_method_404()
	{
		$this->request('GET', 'welcome/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
}
