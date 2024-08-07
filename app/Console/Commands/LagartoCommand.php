<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LagartoCommand extends Command
{
    protected $signature = 'app:lagarto {input_file}';
    protected $description = 'Command description';

    public function handle()
    {
        $entrada_archivo = $this->argument('input_file');

        if (!file_exists($entrada_archivo)) {
            $this->error("No se encontró: $entrada_archivo");
            return;
        }

        $casos = file($entrada_archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach($casos as $caso) {
            [$H, $U, $D, $F] = array_map('intval', explode(' ', $caso));

            if ($H === 0) break;

            $dia = 0;
            $altura_actual = 0.0;
            $factorFatiga = ($U * $F) / 100.0;

            while( true ) {
                $dia ++;
                $escala_actual = max($U, 0);
                $altura_actual += $escala_actual;

                if ($altura_actual > $H) {
                    $this->info("success on day: $dia");
                    break;
                }

                $altura_actual -= $D;
                if ($altura_actual < 0) {
                    $this->info("failure on day: $dia");
                    break;
                }

                $U -= $factorFatiga;
            }
        }
    }
}
