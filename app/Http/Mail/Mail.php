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
        if($this->data["template"]=="register")
            $template="register_email_template";
        elseif($this->data["template"] == "activation_email")
            $template="activation_email";
        elseif($this->data["template"] == "order_status")
            $template="orders/order_status";
        elseif($this->data["template"] == "order_info")
            $template="orders/order_info";
        else
            $template="email_template";

        /*try{
            return $this->from($settings->from_email, $settings->from_name)->subject($this->data["subject"])->view($settings->theme_path.'/email_templates/'.$template)->with('data', $this->data);
        }
        catch (\Exception $e){
            return $this->from($settings->from_email, $settings->from_name)->subject($this->data["subject"])->view('default/email_templates/'.$template)->with('data', $this->data);
        }*/
        return $this->from($settings->from_email, $settings->from_name)->subject($this->data["subject"])->view('default/email_templates/'.$template)->with('data', $this->data);
    }
}
