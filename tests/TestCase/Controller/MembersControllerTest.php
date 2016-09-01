<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MembersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\MembersController Test Case
 */
class MembersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *$articlesTable = TableRegistry::get('Articles');
     * @var array
     */
    public $fixtures = [
        'app.members', 'app.holdings'
    ];

    public function test_moneygrant()
    {
        $idMember = '4878ad85-000a-4436-a6d9-10ba860e3695';

        $holdingsTable = TableRegistry::get('Holdings');

        $AHoldings = $holdingsTable->find()
            ->where(['idMember' => $idMember, 'holdingType' => 1])
            ->first();
        $this->assertEquals(400, $AHoldings->units);

        $this->get('/members/grant/' . $idMember);
        $this->assertRedirect(['controller' => 'Members', 'action' => 'index']);

        $AHoldings = $holdingsTable->find()
            ->where(['idMember' => $idMember, 'holdingType' => 1])
            ->first();
        $this->assertEquals(null, $AHoldings);

        $CHoldings = $holdingsTable->find()
            ->where(['idMember' => '4878ad85-000c-4436-a6d9-10ba860e3695', 'holdingType' => 1])
            ->first();
        $this->assertEquals(100, $CHoldings->units);

        $GHoldings = $holdingsTable->find()
            ->where(['idMember' => '4878ad85-000g-4436-a6d9-10ba860e3695', 'holdingType' => 1])
            ->first();
        $this->assertEquals(50, $GHoldings->units);

    }

    public function test_groundgrant()
    {
        $idMember = '4878ad85-000a-4436-a6d9-10ba860e3695';

        $holdingsTable = TableRegistry::get('Holdings');

        $AHoldings = $holdingsTable->find()
            ->where(['idMember' => $idMember, 'holdingType' => 2])
            ->first();
        $this->assertEquals(200, $AHoldings->units);

        $this->get('/members/grant/' . $idMember);
        $this->assertRedirect(['controller' => 'Members', 'action' => 'index']);

        $AHoldings = $holdingsTable->find()
            ->where(['idMember' => $idMember, 'holdingType' => 2])
            ->first();
        $this->assertEquals(null, $AHoldings);

        //El primigenito hereda todas las tierras
        $BHoldings = $holdingsTable->find()
            ->where(['idMember' => '4878ad85-000b-4436-a6d9-10ba860e3695', 'holdingType' => 2])
            ->first();
        $this->assertEquals(200, $BHoldings->units);

        //El segundo hijo no hereda ninguna tierra
        $CHoldings = $holdingsTable->find()
            ->where(['idMember' => '4878ad85-000c-4436-a6d9-10ba860e3695', 'holdingType' => 2])
            ->first();
        $this->assertEquals(null, $CHoldings);

    }

    public function test_propertisgrant()
    {
        $idMember = '4878ad85-000a-4436-a6d9-10ba860e3695';

        $holdingsTable = TableRegistry::get('Holdings');

        $AHoldings = $holdingsTable->find()
            ->where(['idMember' => $idMember, 'holdingType' => 3])
            ->first();
        $this->assertEquals(3, $AHoldings->units);

        $this->get('/members/grant/' . $idMember);
        $this->assertRedirect(['controller' => 'Members', 'action' => 'index']);

        $AHoldings = $holdingsTable->find()
            ->where(['idMember' => $idMember, 'holdingType' => 3])
            ->first();
        $this->assertEquals(null, $AHoldings);

        //El primigenito hereda 2 propiedadas
        $BHoldings = $holdingsTable->find()
            ->where(['idMember' => '4878ad85-000b-4436-a6d9-10ba860e3695', 'holdingType' => 3]);
        $this->assertEquals(2, $BHoldings->count());

        //El segundo hijo hereda 1 propiedad
        $CHoldings = $holdingsTable->find()
            ->where(['idMember' => '4878ad85-000c-4436-a6d9-10ba860e3695', 'holdingType' => 3]);
        $this->assertEquals(1, $CHoldings->count());


    }
}
