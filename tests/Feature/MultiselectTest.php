<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class MultiselectTest extends TestCase
{
    use RefreshDatabase;

    public function setup() : void{
        parent::setup();
    }
    /** @test  */
    public function it_should_see_livewire_component_on_example_page()
    {
        $response = $this->withoutExceptionHandling()->get('/multiselect');

        $response->assertStatus(200);
        $response->assertSeeLivewire('multiselect');
    }

    /** @test  */
    public function it_should_list_options()
    {
        $users = factory(User::class,10)->create();
        $data = $users->map(function ($user) {
            return ['value' => $user->id, 'name' => $user->name, 'selected'=> false];
        })->toArray();

        $component = Livewire::test('multiselect',['users'=> $users]);

        $component->assertSet('data',$data)
        ->call('add',0);
        $data[0]['selected'] = true;
        $component->assertSet('data',$data);

        $component->assertSet('data',$data)
            ->call('add',2);
        $data[2]['selected'] = true;
        $component->assertSet('data',$data);

        $component->assertSet('data',$data)
            ->call('remove',2);
        $data[2]['selected'] = false;
        $component->assertSet('data',$data);
    }

    /** @test  */
    public function it_should_add_options()
    {
        $users = factory(User::class,10)->create();
        $data = $users->map(function ($user) {
            return ['value' => $user->id, 'name' => $user->name, 'selected'=> false];
        })->toArray();

        $component = Livewire::test('multiselect',['users'=> $users]);


        $component->assertSet('data',$data)
            ->call('add',0)
            ->call('add',3)
            ->call('add',5)
            ->call('add',7);

        $data[0]['selected'] = true;
        $data[3]['selected'] = true;
        $data[5]['selected'] = true;
        $data[7]['selected'] = true;

        $component->assertSet('data',$data);
    }

    /** @test  */
    public function it_should_remove_options()
    {
        $users = factory(User::class,10)->create();
        $data = $users->map(function ($user) {
            return ['value' => $user->id, 'name' => $user->name, 'selected'=> false];
        })->toArray();

        $component = Livewire::test('multiselect',['users'=> $users]);
        $component->assertSet('data',$data);

        $data[0]['selected'] = true;
        $data[3]['selected'] = true;
        $data[5]['selected'] = true;
        $data[7]['selected'] = true;

        $component->call('add',0)
            ->call('add',3)
            ->call('add',5)
            ->call('add',7);

        $data[0]['selected'] = false;
        $data[3]['selected'] = false;
        $data[5]['selected'] = false;
        $data[7]['selected'] = false;
        $component->call('remove',0)
            ->call('remove',3)
            ->call('remove',5)
            ->call('remove',7);

        $component->assertSet('data',$data);
    }
}
