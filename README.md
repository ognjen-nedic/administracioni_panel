# PHP projekat
Text zadatka:

Napraviti administracioni panel u PHP za jednu softversku kompaniju. Softverska kompanija ima svoje radnike koji mogu biti programeri, dizajneri, administratori i menadžeri. Zaposleni imaju svoje ime, prezime, poziciju (npr. programer) i platu. Administracioni panel ima administratora, i samo on može da pristupi sajtu. Administrator ima ime, prezime, poziciju (administrator), platu i lozinku.

Potrebno je napraviti jednu stranicu sa log-in formom (email adresa, lozinka) preko kojeg će administratori da se prijave u sistem. Ukoliko je prijava uspešna, redirektujemo korisnika na : /dashboard / dashboard.php.

## Dashboard.php
Ima 3 skecije:

**Prva sekcija:** navigacija sa elementima: Naslovna, Zaposleni, Email, Izloguj se.

**Druga sekcija:** služi za statistiku, prikazujemo koliko imamo ukupno zaposlenih u kompaniji, koja je prosečna plata, i koliko imamo zaposlenih po poziciji (npr 3 programera, 2 mendažera).

**Treca sekcija:** footer, u footeru prikazujemo ime kompanije i treba da ima boju pozadine.

## Zaposleni.php 
Ima navigaciju.

Na ovoj stranici izlistavamo podatke o zaposlenima u kompaniji. Po defaultu izlistavamo sve zaposlene. Ime, prezime, pozicija, plata. Pored ovih podataka treba da stoji button za ažuriranje & button za brisanje zaposlenog.
Ima dropdown “Pozicija” , pretrazi & dodaj button. U dropdown “Pozicija” treba prikazati pozicije. Klikom na pretraži button izlistavamo samo zaposlene koji pripadaju izabranoj poziciji. 

Klikom na dodaj button se otvara nova stranica, gde može administrator da doda novog radnika u sistem. 

Klikom na azuriraj button se otvara nova stranica i administrator može da azurira podatke zaposlenom.

Klikom na brisanje button obrisemo zaposlenog.

Potrebno je napraviti validaciju na input polja: 
 - Ime i prezime ne moze da sadrzi broj I ne moze ostati prazna.
 - Polje plata moze da bude samo broj I ne moze ostati prazna.
 - Error poruke je potrebno prikazati ispod input polja, bez redirekacija.

Izloguj se: administrator se izloguje, i vraćamo ga na login stranicu.
 
 
## Napomena: 
- Navigaciju i footer definisati u posebnom fajlu, i pomoću include funkcije koristiti na svim stranicama u dashboardu.
- Koristiti SESIJE za logovanje administratora, i na svakoj stranici proveravati da li je ulogovan ili nije. Ukoliko pokušava da pristupi bilo kojoj stranici a da nije ulogovan treba redirektovati na login stranicu.
- SELECT DATA: U select query za listanje zaposlenog oznaciti tacno koja polja nam treba umesto *
- Koristiti objektno orijentisano programiranje.
 -Sajt ne treba da bude responzivan.
- Sve vezano na dizajn je na vas : html struktura, css : boje,font
- Projekat organizovati u foldere :
 1. Svi fajlovi vezani za administracioni panel treba da stoje u dashboard folderu.
 2. CSS treba da stoji u assets folderu.
 3. Klase su u Classes folderu, i svaka klasa je u posebnom fajlu.

- Baza podataka: kreirati tabele Pozicija, Zaposleni. Napraviti potrebnu relaciju i strukturu.

### Podaci za log-inovanje
e-mail: admin@chiron.com

password: a1d2m3i4n5
