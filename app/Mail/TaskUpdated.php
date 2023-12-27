<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope; // Import the Address class
use Illuminate\Queue\SerializesModels;

class TaskUpdated extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /*
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('hello@example.com', 'Test Sender'),
            subject: 'Task Updated',
        );
    }

    // public function build()
    // {
    //     // dd($this->task->title);

    //     return $this->subject('Task Updated')->view('emails.task-updated');
    // }

    /*
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.task-updated',
            with: ['title' => $this->title]
        );
    }

    /*
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
