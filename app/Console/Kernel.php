<?php


protected function schedule(Schedule $schedule)
{
    $schedule->command('classes:delete-completed')->daily();
}