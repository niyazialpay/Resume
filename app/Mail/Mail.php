<?php

namespace App\Mail;

use App\Models\settings;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    protected array $data = [];

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $settings = settings::getSiteSettings();
        return $this->from($settings->from_email, $settings->from_name)->subject($this->data["subject"])->view('email_template')->with('data', $this->data);
    }
}
