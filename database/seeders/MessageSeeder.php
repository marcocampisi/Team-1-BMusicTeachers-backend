<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Teacher;
use Illuminate\Support\Carbon;

//helpers
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      Schema::withoutForeignKeyConstraints(function(){
        Message::truncate();
      });

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
            
          $teachers = Teacher::all();

    foreach ($teachers as $teacher) {
        $messagesCount = $teacher->messages->count();

        while ($messagesCount < 100) {
            $randomMessage = $messages[array_rand($messages)];

            // Calcola la data iniziale 5 anni prima dalla data corrente
            $startDate = Carbon::now()->subYears(5)->startOfYear();
            
            // Genera una data casuale tra 5 anni prima e la data corrente
            $randomDate = Carbon::create(
                rand($startDate->year, Carbon::now()->year),
                rand(1, 12), // Mese casuale
                rand(1, 28),  // Giorno casuale
                rand(0, 23),   // Ore casuali
                rand(0, 59),   // Minuti casuali
                rand(0, 59)    // Secondi casuali
            );

            $message = new Message([
                'content' => $randomMessage,
            ]);

            // Imposta le date create_at e updated_at
            $message->created_at = $randomDate;
            $message->updated_at = $randomDate;

            // Collega il messaggio all'insegnante
            $teacher->messages()->save($message);
            
            $messagesCount++;
        }
    }
    }
}
