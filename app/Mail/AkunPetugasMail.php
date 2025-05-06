<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AkunPetugasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $petugas;
    public $password;

    public function __construct($petugas, $password)
    {
        $this->petugas = $petugas;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Informasi Akun Petugas')
            ->view('emails.akun_petugas')
            ->attach(storage_path('app/public/info_akun_petugas.pdf'), [
                'as' => 'info_akun_petugas.pdf',
                'mime' => 'application/pdf',
            
            ]);
    }
}
