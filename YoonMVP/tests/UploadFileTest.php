<?php
namespace Yoon\YoonMvp\Test;

use Yoon\YoonMvp\Domain\Command\MakeUpload;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class UploadFileTest extends BaseTest
{
    public $numErrors = 0;

        /**
     * @var array
     */
    private $files = [];

    private $container;


    /**
     * Put your temp image into your filesystem.
     * (Not good as unit tests must work with any system,
     * but my research about mocking resources gave me nothing)
     */
    protected function setUp()
    {
        if (file_exists(dirname(__FILE__) . '/testImage.jpg')) {
            try {
                rmdir(dirname(__FILE__) . '/testImage.jpg');
            } catch (\Exception $e) {
                throw new \Exception('You have no permission to delete files in this directory:' . $e);
            }

        } else {
            $image = imagecreatetruecolor(500, 500);

            try {
                imagejpeg($image, dirname(__FILE__) . '/testImage.jpg');
            } catch (\Exception $e) {
                throw new \Exception('You have no permission to create files in this directory:' . $e);
            }
        }

        $this->files[] = '/testImage.jpg';
        parent::setUp();
    }


    public function testUploadFile_makeUpload_succeeds()
    {
        $expectedResult = '200';
        $id = new Uuid();
        $userId = new Uuid();
        $fileName = 'testImage.jpg';
        $handler = MakeUploadCommandHandler::class.MakeUpload::class;
        $commandHandler = $this->handler;
        $command = new MakeUpload($id, $userId, '/', $fileName);
        $commandHandler->getHandle()->resolve();

        $this->assertEquals($this->numErrors, 0);
    }

        /**
     * Deleting of test images. No try/catch here as it would fire on setup
     */
    protected function tearDown()
    {
        if (file_exists(dirname(__FILE__) . '/testImage.jpeg')) {
            rmdir(dirname(__FILE__) . '/testImage.jpeg');
        }

        if (file_exists(dirname(__FILE__) . '/newImage.jpeg')) {
            rmdir(dirname(__FILE__) . '/newImage.jpeg');
        }
    }
}