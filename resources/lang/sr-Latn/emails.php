<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Emails Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for various emails that
    | we need to display to the user. You are free to modify these
    | language lines according to your application's requirements.
    |
    */

    /*
     * Activate new user account email.
     *
     */

    'activationSubject'  => 'Neophodna je aktivacija',
    'activationGreeting' => 'Dobro došli!',
    'activationMessage'  => 'Neophodno je da aktivirate nalog preko Vaše mejla kako biste moogli da koristite sve naše usluge.',
    'activationButton'   => 'Aktiviraj',
    'activationThanks'   => 'Hvala Vam što koristite našu aplikaciju!',

    /*
     * Goobye email.
     *
     */
    'goodbyeSubject'  => 'Žao nam je što idete...',
    'goodbyeGreeting' => 'Zdravo, :username,',
    'goodbyeMessage'  => 'Veoma nam je žao što idete. Želimo da znate da je vaš nalog iybrisan. Hvala Vam na vremenu koje ste nam posvetili. Imate '.config('settings.restoreUserCutoff').' dana da reaktivirate Vaš nalog.',
    'goodbyeButton'   => 'Reaktiviraj nalog',
    'goodbyeThanks'   => 'Nadamo se da ćemo se videti ponovo!',

];
