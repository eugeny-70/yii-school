<?php 
class PasswordHashTest extends \Codeception\Test\Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    /*public function testPasswordIsHash()
    {
        $myPassword = 'qwas123';
        $userRecord = new \app\models\UserRecord;
        $userRecord->setTestUser();
        $userRecord->setPassword($myPassword);
        $userRecord->save();

        $foundRecord = \app\models\UserRecord::findOne($userRecord->id);

        $this->assertInstanceOf(get_class($userRecord), $foundRecord);
        //$this->assertEquals('John', $userRecord->name, 'John does not found');

        $security = new \yii\base\Security();
        $this->assertTrue($security->validatePassword($myPassword, $foundRecord->passhash ));

    }*/

    public function testPasswordIsNotRehashed()
    {
        $myPassword = 'qwas123';
        $userRecord = new \app\models\UserRecord;
        $userRecord->setTestUser();
        $userRecord->setPassword($myPassword);
        $userRecord->save();

        $firstHash = $userRecord->passhash;
        $userRecord->name .= mt_rand(1,9);
        $userRecord->save();

        $this->assertEquals($firstHash, $userRecord->passhash);

        $foundRecord = \app\models\UserRecord::findOne($userRecord->id);
        $this->assertEquals($firstHash, $foundRecord->passhash);


    }
}