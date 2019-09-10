<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => 'Podaci ne odgovaraju ni jednom nalogu.',
    'throttle' => 'Previše neuspelih pokušaja. Pokušajte ponovo za :seconds sekundi.',

    // Activation items
    'sentEmail'        => 'Poslali smo Vam mejl na :email.',
    'clickInEmail'     => 'Molimo Vas da kliknete na link da aktivirate Vaš nalog.',
    'anEmailWasSent'   => 'Mejl je poslat :date na mejl :email.',
    'clickHereResend'  => 'Kliknite ovde da Vam opet pošaljemo mejl.',
    'successActivated' => 'Vaš nalog je uspešno aktiviran.',
    'unsuccessful'     => 'Vaš nalog nije mogao da se aktivira. Molimo Vas pokušajte ponovo.',
    'notCreated'       => 'Vaš nalog nije mogao da se napravi. Molimo Vas pokušajte ponovo.',
    'tooManyEmails'    => 'Previše aktivacionih mejlova je poslato na :email. <br />Molimo Vas da pokušate ponovo kroz <span class="label label-danger">:hours sati</span>.',
    'regThanks'        => 'Hvala Vam što ste se registrovali, ',
    'invalidToken'     => 'Neispravan token za validaciju. ',
    'activationSent'   => 'Mejl za aktivaciju je poslat.',
    'alreadyActivated' => 'Već aktiviran. ',

    // Labels
    'whoops'          => 'Ups! ',
    'someProblems'    => 'Postoje određeni problemi sa informacijama koje ste nam poslali.',
    'email'           => 'Mejl adresa',
    'password'        => 'Lozinka',
    'rememberMe'      => ' Zapamti me',
    'login'           => 'Najavi se',
    'forgot'          => 'Zaboravili ste Vašu lozinku?',
    'forgot_message'  => 'Problemi sa lozinkom?',
    'name'            => 'Korisničko ime',
    'first_name'      => 'Ime',
    'last_name'       => 'Prezime',
    'confirmPassword' => 'Potvrdite lozinku',
    'register'        => 'Napravi nalog',

    // Placeholders
    'ph_name'          => 'Korisničko ime',
    'ph_email'         => 'Mejl adresa',
    'ph_firstname'     => 'Ime',
    'ph_lastname'      => 'Prezime',
    'ph_password'      => 'Lozinka',
    'ph_password_conf' => 'Potvrdite lozinku',

    // User flash messages
    'sendResetLink' => 'Pošalji link za resetovanje',
    'resetPassword' => 'Resetuj lozinku',
    'loggedIn'      => 'Najavljeni ste!',

    // email links
    'pleaseActivate'    => 'Molimo Vas da aktivirate Vaš nalog.',
    'clickHereReset'    => 'Kliknite ovde da resetujete Vašu lozinku: ',
    'clickHereActivate' => 'Kliknite ovde da aktivirate Vaš nalog: ',

    // Validators
    'userNameTaken'    => 'Korisniko ime je zauzeto',
    'userNameRequired' => 'Korisničko ime je obavezno.',
    'fNameRequired'    => 'Ime je obavezno.',
    'lNameRequired'    => 'Prezime je obavezno.',
    'emailRequired'    => 'Mejl je obavezan.',
    'emailInvalid'     => 'Mejl nije važeći.',
    'passwordRequired' => 'Lozinka je obavezna.',
    'PasswordMin'      => 'Lozinka mora da ima barem 6 karaktera.',
    'PasswordMax'      => 'Lozinka ne može da ima više od 20 karaktera.',
    'captchaRequire'   => 'Polje Captcha je obavezno',
    'CaptchaWrong'     => 'Pogrešno popunjeno polje captcha, molimo Vas pokušajte ponovo.',
    'roleRequired'     => 'Korinička uloga je obavezna.',

    //login
    'socialite-login'   => 'Najavi se putem društvenih mreža.',
    'remember-me'       => 'Zapamti me',
    'forgot-password'   => 'Zaboravili ste lozinku?',
    'fill-info'         => 'Molimo Vas da popunite sledeće informacije',
    'or-socialite'      => 'Ili koristite neku od društvenih mreža za najavu',
    'or-register'       => 'Možda nemate nalog i želite da <a href="/register">otvorite nalog</a>?',
    'or-login'          => 'Možda već imate nalog i želite <a href="/login">se najavite</a>?',

];
