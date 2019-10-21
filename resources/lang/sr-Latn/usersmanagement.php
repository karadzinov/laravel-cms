<?php

return [

    // Titles
    'showing-all-users'     => 'Prikaži sve koriniske',
    'users-menu-alt'        => 'Meni za menadžiranje svi korisnika',
    'create-new-user'       => 'Napravi novog korisnika',
    'show-deleted-users'    => 'Prikaži izbrisane korisnike',
    'editing-user'          => 'Ispravite korisnika :name',
    'showing-user'          => 'Prikaži korisnika :name',
    'showing-user-title'    => ' Informacije za korsnika :name',
    'usersmanagement'       => 'Upravljanje korisnicima',


    // Flash Messages
    'createSuccess'   => 'Uspešno napravljen korisnik! ',
    'updateSuccess'   => 'Uspešno ažuriran kornisk! ',
    'deleteSuccess'   => 'Uspešno izbrisan korisnik! ',
    'deleteSelfError' => 'Ne možete da izbrišete svoj nalog! ',

    // Show User Tab
    'viewProfile'            => 'Prikaži profil',
    'editUser'               => 'Ispravi korsnika',
    'deleteUser'             => 'Izbriši korisnika',
    'usersBackBtn'           => 'Nazad na korisnike',
    'usersPanelTitle'        => 'Informacije za korisnika',
    'labelUserName'          => 'Korisnićko ime:',
    'labelEmail'             => 'Mejl:',
    'labelFirstName'         => 'Ime:',
    'labelLastName'          => 'Prezime:',
    'labelRole'              => 'Uloga:',
    'labelStatus'            => 'Status:',
    'labelAccessLevel'       => 'Pristup',
    'labelPermissions'       => 'Ovlašćenja:',
    'labelCreatedAt'         => 'Nappravljen:',
    'labelUpdatedAt'         => 'Ažuriran:',
    'labelIpEmail'           => 'IP adresa mejla sa kog je napravljen nalog:',
    'labelIpEmail'           => 'IP adresa mejla sa kog je napravljen nalog:',
    'labelIpConfirm'         => 'Potvrđivanje IP adrese:',
    'labelIpSocial'          => 'IP adresa društvene mreže sa koje je napravljen nalog IP:',
    'labelIpAdmin'           => 'IP adresa admina:',
    'labelIpUpdate'          => 'Poslenje ažuriranje IP adrese:',
    'labelDeletedAt'         => 'Izbrisano',
    'labelIpDeleted'         => 'IP adresa sa koje je izbrisan nalog:',
    'usersDeletedPanelTitle' => 'Informacije za izbrisanog korisnika',
    'usersBackDelBtn'        => 'Nazad na izbrisane korisnike',

    'successRestore'    => 'Korisnik uspšeno reaktiviran.',
    'successDestroy'    => 'Podaci o korisniku uspešno izbrisani.',
    'errorUserNotFound' => 'Korisnik nije pronađen.',

    'labelUserLevel'  => 'Nivo',
    'labelUserLevels' => 'Nivoi',

    'users-table' => [
        'caption'   => '{1} :userscount korisnika ukupno|[2,*] :userscount korisnika ukupno',
        'id'        => 'ID',
        'name'      => 'Korisničko ime',
        'fname'     => 'Ime',
        'lname'     => 'Prezime',
        'email'     => 'Mejl',
        'role'      => 'Uloga',
        'created'   => 'Napravljen',
        'updated'   => 'Ažuriran',
        'actions'   => 'Radnje',
        'updated'   => 'Ažuriran',
    ],

    'buttons' => [
        'create-new'    => 'Novi korisnik',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Izbriši</span><span class="hidden-xs hidden-sm hidden-md"> korisnika</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Prikaži</span><span class="hidden-xs hidden-sm hidden-md"> korisnika</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Ispravi</span><span class="hidden-xs hidden-sm hidden-md"> korisnika</span>',
        'back-to-users' => '<span class="hidden-sm hidden-xs">Nazad na </span><span class="hidden-xs">korisnike</span>',
        'back-to-user'  => 'Nazad  <span class="hidden-xs">na korisnika</span>',
        'delete-user'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Izbriši</span><span class="hidden-xs"> korisnika</span>',
        'edit-user'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Ispravi</span><span class="hidden-xs"> Korisnika</span>',
    ],

    'tooltips' => [
        'delete'        => 'Izbriši',
        'show'          => 'Prikaži',
        'edit'          => 'Ispravi',
        'create-new'    => 'Napravi novog korisnika',
        'back-users'    => 'Nazad na korisnike',
        'email-user'    => 'Mejl korisnika :user',
        'submit-search' => 'Potvrdi pretragu korisnika',
        'clear-search'  => 'Očisti rezultate pretrage',
    ],

    'messages' => [
        'userNameTaken'          => 'Korisničko ime je zauzeto',
        'userNameRequired'       => 'Korisničko ime je obavezno',
        'fNameRequired'          => 'Ime je obavezno',
        'lNameRequired'          => 'Prezime je obavezno',
        'emailRequired'          => 'Mejl je obavezan',
        'emailInvalid'           => 'Mejl je nevažeći',
        'passwordRequired'       => 'Šifra je obavezna',
        'PasswordMin'            => 'Šifra mora da ima barem 6 karaktera',
        'PasswordMax'            => 'Šifra može da ima najviše 20 karaktera',
        'captchaRequire'         => '\'Captcha\' polje je obavezno',
        'CaptchaWrong'           => 'Pogrešno uneti podaci za \'Captcha\' polje, molimo Vas pokušajte ponovo.',
        'roleRequired'           => 'Korisnička uloga je obavezna.',
        'user-creation-success'  => 'Uspešno kreiran korisnik!',
        'update-user-success'    => 'Uspešno ažuriran korisnik!',
        'delete-success'         => 'Uspešno izbrisan korisnik!',
        'cannot-delete-yourself' => 'Ne možete izbrisati svoj nalog!',
    ],

    'show-user' => [
        'id'                => 'Korisnički ID',
        'name'              => 'korisničko ime',
        'email'             => '<span class="hidden-xs">Korinički </span>mejl',
        'role'              => 'Uloga',
        'created'           => 'Napravljen',
        'updated'           => 'Ažuriran',
        'labelRole'         => 'Uloga',
        'labelAccessLevel'  => '<span class="hidden-xs">Korisnički</span> nivo pristupa|<span class="hidden-xs">User</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Prikazivanje rezultata pretrage',
        'found-footer'      => ' Podaci nisu pronaženi',
        'no-results'        => 'Nema rezultata',
        'search-users-ph'   => 'Pretraži korisnike',
    ],

    'modals' => [
        'delete_user_message' => 'Da li ste sigurni da želite da izbrišete korisnika :user?',
        'delete-user' => 'Brisanje korisnika',
    ],
];
