# TP10DPBO2425C2

Saya Niha April Miani dengan NIM 2402567 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain Pemogramana Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

## Desain Tabel ##
![Deskripsi gambar](Dokumentasi/desain.png)

# a. movies #
- Menyimpan data film
- Atribut: id_movie, title, genre, duration
- Digunakan sebagai referensi jadwal
  
b. studios
- Menyimpan data studio bioskop
- Atribut: id_studio, name, capacity
  
c. schedules
- Menyimpan jadwal tayang
- Atribut: id_schedule, id_movie, id_studio, showtime
- Relasi:
  - id_movie → movies.id_movie
  - id_studio → studios.id_studio
    
d. bookings
- Menyimpan pemesanan tiket
- Atribut: id_booking, id_schedule, customer_name, seats
- Relasi:
  - id_schedule → schedules.id_schedule
  - Kesimpulan
