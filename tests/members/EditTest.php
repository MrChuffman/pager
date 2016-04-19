<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    
    protected $member;

    public function setUp()
    {
        parent::setUp();

        factory(App\Member::class)->create(['department_id' => 614, 'name' => 'Craig Huffman']);

        $this->member = factory(App\Member::class)->create([
            'rip_runs' => 1,
            'notifications' => 1,
            'carrier' => 'vtext.com'
        ]);
    }

    /**
     * @test
     */
    public function it_throws_validation_errors_when_missing_information()
    {
        $this->visit(route('members.edit', $this->member->id))
            ->type('', 'department_id')
            ->select('', 'rank')
            ->type('', 'name')
            ->type('', 'phone')
            ->select('', 'carrier')
            ->type('password', 'password')
            ->type('passfail', 'password_confirmation')
            ->press('Member__Edit__submit')
            ->see('The department ID field is required.')
            ->see('You must select a rank.')
            ->see('The name field is required.')
            ->see('The phone field is required.')
            ->see('You must select a carrier.')
            ->see('The password confirmation does not match.');
    }

    /**
     * @test
     */
    public function edit_member_to_not_receive_notifications_and_runs()
    {
            $this->seeInDatabase('members', ['rip_runs' => '1']);
            $this->seeInDatabase('members', ['notifications' => '1']);
            
            $this->visit(route('members.edit', $this->member->id))
                ->uncheck('rip_runs')
                ->uncheck('notifications')
                ->press('Member__Edit__submit')
                ->see($this->member->name.' was updated.');

            $this->seeInDatabase('members', ['rip_runs' => '0']);
            $this->seeInDatabase('members', ['notifications' => '0']);
 
    }

    /**
     * @test
     */
    public function does_not_throw_unique_error_when_saving_own_name_or_number()
    {
        $this->visit(route('members.edit', $this->member->id))
                ->type($this->member->name, 'name')
                ->press('Member__Edit__submit')
                ->see($this->member->name.' was updated.');
    }

    /**
     * @test
     */
    public function throws_unique_error_when_saving_with_someone_elses_name_or_number()
    {
        $this->visit(route('members.edit', $this->member->id))
            ->type('Craig Huffman', 'name')
            ->type(614, 'department_id')
            ->press('Member__Edit__submit')
            ->see('Craig Huffman has already been registered.')
            ->see('The department ID of 614 has already been assigned.');
    }

     /**
     * @test
     */
    public function successfully_edits_a_user()
    {
        $this->visit(route('members.edit', $this->member->id))
            ->type('675', 'department_id')
            ->select('Firefighter', 'rank')
            ->type('John Doe', 'name')
            ->type('5555555555', 'phone')
            ->select('vtext.com', 'carrier')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->press('Member__Edit__submit')
            ->see('John Doe was updated.');

            $this->seeInDatabase('members', ['department_id' => '675']);
            $this->seeInDatabase('members', ['name' => 'John Doe']);
    }
}
