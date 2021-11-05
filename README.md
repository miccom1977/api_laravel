REST API Laravel


Administration

    1. Register

    /api/register
    Rejestrowanie do systemu, dane przesyłamy metodą POST

    2. Login

    /api/login
    Logowanie do systemu, dane przesyłamy metodą POST

    3. Add Term

    /api/admin/booking
    PO zalogowaniu kopiujemy token, wysyłamy token metoda POST, Dodajemy termin podając datę w formcie RRRR-mm-dd H:i:s 

    4. Destroy Term

    /api/admin/booking/{id}
    Usuwamy konkretny termin podajac ID terminu który chcemy usunąć, uzywamy metody DELETE


    5. Get All Terms

    /api/admin/booking
    Pobieramy wszystkie terminy ( i wolne i zajęte )

    6. Get One Booking

    /api/admin/booking/{id}
    Wyswietlamy jeden termin o ID {id}, id przesyłamy metoda GET ( w pasku adresu )

    7. Get All Bookings

    /api/admin/getAllReservedBookings
    Wyswietlamy wszystkie Rezerwacje, metoda GET




USers

    1. Get All Free Terms

    /api/booking
    Wyswietlamy wszystkie wolne terminy, metoda GET

    2. Set On Term

    /api/booking/{term_id}
    Aby zapisać się na dany termin należy wysłać do systemu metodą GET ( w pasku adresu ) id terminu i metodą POST ( akceptowana metoda w Laravel dla update to PUT ) numer rejestracyjny samochodu
    Jesli rejestracja samochodu jest już w systemie to rezerwacja nowego terminu nie będzie możliwa


    3. Set On to First Free Term

    /api/signInFirstTerm/
    Aby zapisać się na pierwszy wolny termin należy wysłać do systemu metodą POST numer rejestracyjny samochodu
    Jesli rejestracja samochodu jest już w systemie to rezerwacja nowego terminu nie będzie możliwa


    4. Release Term

    /api/release/{car_plate}
    Aby zwolnić termin wysyłamy metodą POST numer rejestracyjny samochodu




