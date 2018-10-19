<?php

namespace ArtisanCMS\CMS\Tests\Starter;

use Starter;
use ArtisanCMS\CMS\Tests\TestCase;

class StarterTest extends TestCase
{
    /**
     * Check that the multiply method returns correct result
     * @return void
     */
    public function testMultiplyReturnsCorrectValue()
    {
        $this->assertTrue(Starter::doesThisWork());
    }

    /** @test */
    public function itCanSeeIfAModelExists()
    {
        $starter = Starter::make([
            'name' => 'Thing',
            'email' => 'thing@thing.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password')
        ]);
        $starter->save();

        $dbStarter = Starter::first();
        $this->assertEquals($starter->name, $dbStarter->name);

        $this->visit(route('admin.dash'))
             ->see('ArtisanCMS - The Laravel CMS for Artisans');
    }

    /** @test */
    public function itCanVisitHomePage()
    {
        $this->visit(route('front'))
            ->see('Is this working?');

        // $this->visit(route('login'))
        //     ->see('Login');
    }
}
