<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PastaFixture
 */
class PastaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'pasta';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'pot_id' => 1,
            ],
        ];
        parent::init();
    }
}
