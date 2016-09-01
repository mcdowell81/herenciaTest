<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HoldingsFixture
 *
 */
class HoldingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'idMember' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'units' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'unitValue' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'holdingType' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'divisible' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '7257a94d-84a7-47bb-bfac-15a329f058f3',
            'idMember' => '4878ad85-000a-4436-a6d9-10ba860e3695',
            'units' => 400,
            'unitValue' => 1,
            'holdingType' => 1,
            'divisible' => 1,
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ],
        [
            'id' => '7257a94d-84a8-47bb-bfac-15a329f058f3',
            'idMember' => '4878ad85-000a-4436-a6d9-10ba860e3695',
            'units' => 200,
            'unitValue' => 300,
            'holdingType' => 2,
            'divisible' => 0,
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ],
        [
            'id' => '7257a94d-84a9-47bb-bfac-15a329f058f3',
            'idMember' => '4878ad85-000a-4436-a6d9-10ba860e3695',
            'units' => 3,
            'unitValue' => 1000000,
            'holdingType' => 3,
            'divisible' => 0,
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ]
    ];
}
