<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $task_id = $request->task_id;
        $feedbacks = Feedback::where('task_id', $task_id)->get();

        return view('feedbacks.index', compact('feedbacks', 'task_id'));
    }

    public function new(Request $request)
    {
        $task_id = $request->task_id;

        return view('feedbacks.new', compact('task_id'));
    }

    public function create(Request $request)
    {
        $this->validate($request, ['description' => 'required']);

        $feedback = Feedback::create([
            'description' => $request->description,
            'task_id' => $request->task_id,
        ]);

        return redirect()->route('tasks');
    }
}
