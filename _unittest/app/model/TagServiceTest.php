<?php
global $g_boot_time;
global $g_app;
if (empty($g_boot_time)) {
    $g_boot_time = microtime(true);
    $app_config = require(dirname(__FILE__) . '/../../../config/boot.php');
    require $app_config['QEEPHP_DIR'] . '/library/q.php';
    require $app_config['APP_DIR'] . '/myapp.php';
    $g_app = MyApp::instance($app_config);
}

echo 'TagServiceTest';

/**
 * Test class for TagService.
 * Generated by PHPUnit on 2013-08-31 at 01:34:48.
 */
class TagServiceTest extends PHPUnit_Framework_TestCase {

    /**
     * @var TagService
     */
    protected $app;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers TagService::find
     * @covers TagService::findOrCreate
     */
    public function testFindOrCreate() {
        $text = 'tag'.rand(100, 999);
        echo 'test tag:' . $text;
        $tag = TagService::find($text);
        $this->assertEquals(null, $tag->id());
        $tag = TagService::findOrCreate($text);
        $this->assertTrue($tag->id() > 0);
    }

    /**
     * @covers TagService::create
     * @covers TagService::find
     */
    public function testCreateAndDelete() {
        $text = 'tag'.rand(100, 999);
        echo 'test tag:' . $text;
        $tag = TagService::find($text);
        $this->assertEquals(null, $tag->id());
        $tag = TagService::create($text);
        $tag = TagService::find($text);
        $this->assertTrue($tag->id() > 0);
        TagService::delete($text);
        $tag = TagService::find($text);
        $this->assertEquals(null, $tag->id());
    }

    /**
     * @covers TagService::findOrCreate
     * @covers TagService::findTags
     * @covers TagService::findOrCreateTags
     */
    public function testFindOrCreateTags() {
        $text = 'tag'.rand(100, 999);
        $saTags = array("private", $text);
        $tag = TagService::findOrCreate("private");
        
        $tags = TagService::findTags($saTags);
        $this->assertEquals(1, count($tags));
        
        $tags = TagService::findOrCreateTags($saTags);
        $tags = TagService::findTags($saTags);
        $this->assertEquals(2, count($tags));

        TagService::delete($text);
    }

}

?>
