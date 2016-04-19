<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     */
    public function sees_a_list_of_members()
    {
        $users = factory(App\Member::class, 2)->create();

        $this->visit(route('members.index'))
            ->see($users[0]->name)
            ->see($users[0]->department_id)
            ->see($users[0]->phone)
            ->see($users[0]->carrier)
            ->see($users[0]->rip_runs)
            ->see($users[0]->notifications)
            ->see($users[1]->name);
    }

    /**
     * @test
     */
    public function has_the_right_links()
    {
            factory(App\Member::class)->create();

            $this->visit(route('members.index'))
                    ->click('Member__Index__create_link')
                    ->assertResponseOK();

            $this->visit(route('members.index'))
                ->click('Member__Create__edit_1')
                ->assertResponseOK();
    }
}
