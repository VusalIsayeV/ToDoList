<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\DemoList;

class TaskRouteTest extends TestCase
{
    /**
     * Test to check if DemoList API GET request returns a successful response.
     */
    public function test_get_full_task_routes(): void
    {

        $response = $this->get('/api/FullTask');

        $response->assertStatus(200);
    }

    /**
     * Test to check if the POST request to FullTask adds data successfully.
     */
    public function test_post_full_task_routes(): void
    {

        $data = [
            'TaskName' => 'New Task',
            'TaskAbout' => 'This is a test task.',
        ];

  
        $response = $this->post('/api/FullTask', $data);

        $response->assertStatus(201); 

        $this->assertDatabaseHas('demo_lists', [
            'TaskName' => 'New Task',
            'TaskAbout' => 'This is a test task.',
        ]);
    }

    /**
     * Test to check if the PATCH request to FullTask/done/{id} works.
     */
    public function test_patch_done_task(): void
    {

        $demoList = DemoList::factory()->create([
            'TaskStatus' => true,
        ]);

 
        $response = $this->patch('/api/FullTask/done/' . $demoList->TaskId);

        $response->assertStatus(200);


        $this->assertDatabaseHas('demo_lists', [
            'TaskId' => $demoList->TaskId,
            'TaskStatus' => true,
        ]);
    }

    /**
     * Test to check if the PATCH request to FullTask/delete/{id} works.
     */
    public function test_delete_delete_task(): void
    {
        // Yeni bir DemoList kaydı oluştur
        $demoList = DemoList::factory()->create([
            'TaskDelete' => true,
        ]);


        $response = $this->delete('/api/FullTask/delete/' . $demoList->TaskId);


        $response->assertStatus(200);


        $this->assertDatabaseHas('demo_lists', [
            'TaskId' => $demoList->TaskId,
            'TaskDelete' => true,
        ]);
    }
}
