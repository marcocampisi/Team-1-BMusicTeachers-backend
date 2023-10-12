<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            "Ciao, sono un tuo ex allievo. Ti ringrazio ancora per tutto quello che mi hai insegnato.",
            "Cerco un insegnante di musica per mio figlio. Mi consigli qualcuno?",
            "Mi piacerebbe partecipare a una tua lezione di prova.",
            "Hai qualche consiglio per migliorare la mia tecnica di chitarra?",
            "Sei disponibile per una lezione privata?",
            "Vorrei iscrivermi al tuo corso di pianoforte.",
            "Mi piacerebbe imparare a suonare la batteria. Ti consiglieresti un corso?",
            "Ho appena acquistato una nuova chitarra. Mi potresti dare qualche consiglio?",
            "Sto cercando un insegnante di musica per un bambino di 5 anni.",
            "Mi piacerebbe imparare a suonare il violino. Hai qualche suggerimento?",
            "Sono un musicista professionista e sto cercando un insegnante per migliorare le mie abilità.",
            "Cerco un insegnante di musica che possa venire a casa mia.",
            "Ho bisogno di aiuto per preparare un esame di musica.",
            "Vorrei imparare a suonare un nuovo strumento. Hai qualche consiglio?",
            "Mi piacerebbe partecipare a un coro. Conosci qualche coro nella mia zona?",
            "Ho appena iniziato a suonare il pianoforte. Mi potresti dare qualche consiglio?",
            "Sto cercando un insegnante di musica che possa aiutarmi a vincere una borsa di studio.",
            "Cerco un insegnante di musica che possa aiutarmi a suonare in un gruppo musicale.",
            "Cerco un insegnante di musica che possa aiutarmi a preparare un concerto.",
            "Mi piacerebbe imparare a suonare la musica classica. Hai qualche suggerimento?",
            "Sto cercando un insegnante di musica che possa aiutarmi a suonare musica jazz.",
            "Ho bisogno di aiuto per imparare a leggere la musica.",
            "Cerco un insegnante di musica che possa aiutarmi a migliorare la mia creatività musicale.",
            "Vorrei imparare a suonare un nuovo genere musicale. Hai qualche consiglio?"
          ];
            
          foreach($messages as $message) {
            Message::create([
                'content' => $message
            ]);
          }
    }
}
