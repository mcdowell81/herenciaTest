<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembersFixture
 *
 */
class MembersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'birthdate' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'idFamily' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'idParent' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
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
            'id' => '4878ad85-000a-4436-a6d9-10ba860e3695',
            'name' => 'A',
            'birthdate' => '2016-08-30 16:37:15',
            'idFamily' => 'c86783a0-0001-4ecc-b6de-7d8aab67c323',
            'idParent' => null,
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ],
        [
            'id' => '4878ad85-000b-4436-a6d9-10ba860e3695',
            'name' => 'B',
            'birthdate' => '2016-08-29 16:37:15',
            'idFamily' => 'c86783a0-0001-4ecc-b6de-7d8aab67c323',
            'idParent' => '4878ad85-000a-4436-a6d9-10ba860e3695',
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ],
        [
            'id' => '4878ad85-000c-4436-a6d9-10ba860e3695',
            'name' => 'C',
            'birthdate' => '2016-08-30 16:37:15',
            'idFamily' => 'c86783a0-0001-4ecc-b6de-7d8aab67c323',
            'idParent' => '4878ad85-000a-4436-a6d9-10ba860e3695',
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ],
        [
            'id' => '4878ad85-000g-4436-a6d9-10ba860e3695',
            'name' => 'G',
            'birthdate' => '2016-08-30 16:37:15',
            'idFamily' => 'c86783a0-0001-4ecc-b6de-7d8aab67c323',
            'idParent' => '4878ad85-000c-4436-a6d9-10ba860e3695',
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ],
        [
            'id' => '4878ad85-000h-4436-a6d9-10ba860e3695',
            'name' => 'H',
            'birthdate' => '2016-08-30 16:37:15',
            'idFamily' => 'c86783a0-0001-4ecc-b6de-7d8aab67c323',
            'idParent' => '4878ad85-000c-4436-a6d9-10ba860e3695',
            'created' => '2016-08-30 16:37:15',
            'modified' => '2016-08-30 16:37:15'
        ],
    ];
}
