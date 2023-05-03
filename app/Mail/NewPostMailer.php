<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPostMailer extends Mailable implements ShouldQueue {

    use Queueable, SerializesModels;

    private $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function build() {
        $users = User::inRandomOrder()->get();
        $editors = [];
        // ищем тех, кто может опубликовать пост
        foreach ($users as $user) {
            if ($user->hasPermAnyWay('publish-post')) {
                $editors[] = ['name' => $user->name, 'mail' => $user->email];
            }
            if (count($editors) > 1) break;
        }
        if (count($editors)) {
            $this->to($editors[0]['mail'], $editors[0]['name']);
            if (isset($editors[1])) {
                $this->cc($editors[1]['mail'], $editors[1]['name']);
            }
        } else {
            // если письмо некому отправлять
            $this->to(config('mail.from.address'), config('mail.from.name'));
        }
        // удаляем $this->from(..........);
        $this->subject('Новый пост блога');
        return $this->view('email.new-post');

    }

    use Queueable, SerializesModels;


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Post Mailer',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
