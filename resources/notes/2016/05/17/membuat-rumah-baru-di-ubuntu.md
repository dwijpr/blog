Membuat Rumah Baru di Ubuntu
============================

Belum punya uang untuk membuat rumah sendiri, untuk masa
depan yang indah? Paling tidak membuat rumah baru di **Ubuntu**
merupakan sesuatu yang sangat mudah dilakukan.

Sering bekerja dengan banyak _environment_, untuk pekerjaan
pribadi, pekerjaan kantor, yang kantornya lebih dari satu, dan
memiliki pekerjaan secara _freelance_. Hal tersebut sering
membuat komputer yang digunakan untuk bekerja memiliki
berkas-berkas yang tersebar dimana-mana. Hingga akhirnya
ketika dirasa terlalu "berantakan" dan tidak tau mana 
_file_<sup>2</sup> yang masih penting dan tidak, membuat saya
sering memutuskan untuk meng-_install_ ulang komputer.

Namun, belakangan ini saya mulai menemukan metode baru untuk
menyelesaikan masalah ini. Saya rasa meng-_install_ ulang
terlalu riskan hanya untuk alasan tersebut, cara terbaru
yang saya lakukan adalah **_membuat rumah baru_**.

####Membuat Pengguna

Satu-satunya tahap yang dilakukan adalah dengan menjalankan
_command_ berikut pada terminal:

```bash
$ sudo adduser iwd
```

Mengeksekusi program **adduser** harus memiliki _sudo_,
**addUser: Only root may add a user or group to the system**.
Salah satu cara membuat pengguna mendapatkan akses _root_
ini adalah dengan,

```bash
$ sudo adduser iwd sudo
```

Dengan begitu rumah baru pada sistem operasi **Ubuntu** telah
terbuat, hal ini akan sangat membantu pada saat bekerja
untuk beberapa hal yang besar. Namun masalah selanjutnya yang
muncul adalah, _**cara untuk kreatif membuat sebuah nama?**_


>   Ubuntu sudo namingThings adduser