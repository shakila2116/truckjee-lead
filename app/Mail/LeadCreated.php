<?php

namespace App\Mail;

use App\Models\Source;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LeadCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Source $lead)
    {
        Log::info('New Lead Created Notification');
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->cc($this->lead->email)
            ->subject("New Lead created")
            ->markdown('email.create_lead');

//        return $this->view('email.createlead');
    }
}
