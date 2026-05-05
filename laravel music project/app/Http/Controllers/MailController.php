<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Пошта жіберу функциясы.
     */
    public function sendEmail()
    {
        $mailData = [
            'title' => 'Жаңа трек жүктелді!',
            'body' => 'Платформаға жаңа музыкалық туынды қосылды. Тыңдап көріңіз және бағалаңыз.',
            'subject' => 'New Music Submission'
        ];

        // Поштаны жіберу (қабылдаушыны көрсетіңіз)
        // Нақты электрондық поштаны қоюға болады немесе .env-дегі тест поштасын қолдануға болады
        Mail::to('user@example.com')->send(new DemoEmail($mailData));

        return back()->with('success', 'Пошта сәтті жіберілді!');
    }
}

