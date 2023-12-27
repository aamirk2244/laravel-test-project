<?php

namespace App\Listeners;

use App\Events\TaskUpdateEvent;
use App\Mail\TaskUpdated;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TaskUpdateListener
{
    /**
     * Create the event listener.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Handle the event.
     */
    public function handle(TaskUpdateEvent $event)
    {
        $updatedTask = $event->task;

        // Get all users
        $users = User::all();
        foreach ($users as $user) {
            //     // dd($user->email);
            //     // try {
            Mail::to($user->email)->send(new TaskUpdated($updatedTask->title));
            //     // } catch (\Exception $e) {
            //     //     // Log the exception details
            //     //     Log::error('Email sending failed: '.$e->getMessage());
            //     // }
        }
    }
}
