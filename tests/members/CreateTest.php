<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     */
    public function it_throws_validation_errors_when_missing_information()
    {
        $this->visit(route('members.create'))
            ->type('', 'department_id')
            ->select('', 'rank')
            ->type('', 'name')
            ->type('', 'phone')
            ->select('', 'carrier')
            ->type('password', 'password')
            ->type('passfail', 'password_confirmation')
            ->press('Member__Create__submit')
            ->see('The department id field is required.')
            ->see('The rank field is required.')
            ->see('The name field is required.')
            ->see('The phone field is required.')
            ->see('The carrier field is required.')
            ->see('The password confirmation does not match.');
    }

    /**
     * @test
     */
    public function it_throws_an_error_when_user_is_not_unique()
    {
        factory(App\Member::class)->create([
            'department_id' => 614,
            'name' => 'Craig Huffman',
            'phone' => '5555555555'
        ]);

        $this->visit(route('members.create'))
            ->type('Craig Huffman', 'name')
            ->type('5555555555', 'phone')
            ->type('614', 'department_id')
            ->press('Member__Create__submit')
            ->see('Craig Huffman has already been registered.')
            ->see('The department ID of 614 has already been assigned.')
            ->see('The phone number has already been used.');
    }

    /**
     * @test
     */
    public function create_a_member_that_receives_messages()
    {
            $this->visit(route('members.create'))
                ->type('614', 'department_id')
                ->select('Captain', 'rank')
                ->type('Craig Huffman', 'name')
                ->type('5555555555', 'phone')
                ->select('vtext.com', 'carrier')
                ->check('rip_runs')
                ->check('notifications')
                ->press('Member__Create__submit')
                ->see('Craig Huffman was added to the database!');

            $this->seeInDatabase('members', ['name' => 'Craig Huffman']);
            $this->seeInDatabase('members', ['rip_runs' => '1']);
            $this->seeInDatabase('members', ['notifications' => '1']);
    }

    /**
     * @test
     */
    public function create_a_member_that_cant_receive_messages()
    {
            $this->visit(route('members.create'))
                ->type('614', 'department_id')
                ->select('Captain', 'rank')
                ->type('Craig Huffman', 'name')
                ->type('5555555555', 'phone')
                ->select('vtext.com', 'carrier')
                ->uncheck('rip_runs')
                ->uncheck('notifications')
                ->press('Member__Create__submit')
                ->see('Craig Huffman was added to the database!');

            $this->seeInDatabase('members', ['name' => 'Craig Huffman']);
            $this->seeInDatabase('members', ['rip_runs' => '0']);
            $this->seeInDatabase('members', ['notifications' => '0']);
    }

     /**
     * @test
     */
    public function create_a_member_that_is_an_admin()
    {
            $this->visit(route('members.create'))
                ->type('614', 'department_id')
                ->select('Captain', 'rank')
                ->type('Craig Huffman', 'name')
                ->type('5555555555', 'phone')
                ->select('vtext.com', 'carrier')
                ->check('admin')
                ->type('password', 'password')
                ->type('password', 'password_confirmation')
                ->press('Member__Create__submit')
                ->see('Craig Huffman was added to the database!');

            $this->seeInDatabase('members', ['name' => 'Craig Huffman']);
            $this->seeInDatabase('members', ['admin' => '1']);
    }
     
    /**
     * @test
     */
    public function an_admin_must_have_a_password()
    {
        $this->visit(route('members.create'))
            ->check('admin')
            ->press('Member__Create__submit')
            ->see('The password field is required when a user can maintain members.');
    }
}
