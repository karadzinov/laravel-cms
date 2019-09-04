<?php 

return [
  'translations'    => 'Prevodi',
  'create-new'      => 'Napravi prevod',
  'edit'            => 'Ispravi prevod',
  'total'           => 'prevoda ukupno',
  'delete'          => 'Izbrisi prevod',
  'confirm-delete'  => 'Da li ste sigurno da zelite da izbrisete ovaj prevod?',
  'back-to'         => 'Nazad na prevode',
  'save'            => 'Sačuvaj prevod',
  'update'          => 'Ažuriraj prevod',
  'success'         => [
        'created' => 'Prevod uspešno napravljen.',
        'updated' => 'Prevod uspešno ažuriran.',
        'deleted' => 'Prevod uspešno izbrisan.',
    ],
  'error'         => 'Došlo je do greške prilikom procesa, molimo Vas pokušajte ponovo kasnije.',
  
  'created-message' => 'Sada kada ste kreirali novi jezik, treba da prevedte sajt na dati jezik. Ukoliko ga ne prevedete, sadržina će biti prikazana na engleskom i primena novog jezika neće imati efekta. Bićete preusmereni na stranicu za redigovanje sadržine. Možete da se zaustavite i da nastavite kada god to poželite.',
  
  'choose-language' => 'Izaberi jezik',
  'explication'     => 
    '
    <div class="translations-explication">
      <p>
        Da biste ažurirali prevode za ovaj jezik, treba da odaberete fajl sa desnog straničnog menija i da ažurirate sva njegova polja. Podrazumevani jezik u svim fajlovima je engleski. Dok prevodite ovakvu vrstu tekstova, treba da obratite pažnju na nekoliko stvari:
        </p>
        <ul>
          <li>
            Svi fajlovi treba da budu sačuvani posebno, odnosno svaki fajl ima svoje dugme "sačuvaj".
          </li>
          <li>
            Naš "glavni" fajl je <code>general</code>. Sva njegova polja se odnose samo na korisnički dio vebsajta, tako da bi bilo najbolje da ovaj fajl bude prvi preveden. 
              Ostali fajlovi čija sadržina se nalazi na korisničkom dijelu sajta su:
              <code>validation</code>, <code>auth</code>, <code>passwords</code>, <code>register</code> and <code>socials</code>.
              Svi ostali fajlovi se odnose na admin panel, tako da ukoliko razumete engleski jezik, nema potrebe za njihovim prevođenjem.
          </li>
          <li>Imena fajlova se ne mogu menjati.</li>
          <li>
            Možete da se zaustavite i nastavite neki drugi put, samo treba da vodite računa ukoliko je odabrani jezik aktiviran u podešavanjima sajta. Budite oprezni i kada idete sa jednog fajla na drugi, jer će sve prethodno napravljene promene biti obrisane u procesu prelaska sa jednog na drugi.
          </li>
          <li>
            Ukoliko naiđete na reči koje počinju sa ":" (npr. :name, :title), ostavite ih u tom obliku jer su to mesta gde se reči dodaju dinamički.
          </li>
          <li>
          Ukoliko naiđete na delove prevoda koji počinju sa <code><_span class="exemple-class" id="just-an-exemple-id">This is just an exemple<_/span></code> promenite samo deo između tagova "span", tj. u ovom primeru "This is just an exemple" može da se promeni.
          </li>
          <li>
            Ukoliko naiđete na reči bez smisla, (npr. <code>"&_laquo";</code>) ostavite ih u tom obliku, to su specijalni znaci pisani za kompjuter. Prethodni znak npr. označava &laquo;
          </li>
          <li>
            Budite uporni, ponavljamo da ukoliko ostavite neprevedene, sadržiana će biti prikazana na engleskom.
          </li>
        </ul>
    </div>
  ',
  'how-to'                   => 'Kako prevesti',
  'missing-enabled-language' => 'Imate :count jezika bez prevedenih fajlova. Molimo Vas da ih napravite na stranici Prevodi.',
  'drag-and-drop' => 'Prevucite slajdove od vrha prema dnu tako da prikazuju željeni redosled.',
  'change-order'  => 'Izmeni redosled',
];