Error RVM Install Ruby
======================

<div class="text-danger">
    Failed Download - There has been an error fetching the ruby interpreter. Halting the installation.
</div>
<br>

**RVM** adalah alat yang berbasis **CLI** yang mana mempermudah peng-_install_an, mengatur dan bekerja
menggunakan beberapa _environment_ **Ruby** mulai dari _interpreter_nya, hingga kumpulan _gems_nya.

Sudah beberapa waktu sejak saya menggunakan RVM untuk platform penggunaan **Ruby** ini, yang nantinya
akan meng-install **Jekyll** dan meng-update _posting_ pada blog ini. Namun, waktu proses penginstallan
kemarin, saya menemukan kesulitan untuk meng-install **Ruby** _interpreter_ nya, seperti gambar
berikut

<img class="img-responsive" src="{{ asset('images/other/ruby-download-error.png') }}">

Awalnya, saya kira _server_ dari **Ruby** _interpreter_nya yang bermasalah, namun setelah dicoba menggunakan
selang beberapa waktu, hasilnya tetap sama saja. Setelah mencari permasalah yang serupa berikut adalah
solusi dari kendala yang saya alami, cukup ketikan perintah berikut dan ulangi proses install
**Ruby** _interpreter_nya

```bash
$ rvm get head
```

Perintah tersebut adalah untuk meng-upgrade **RVM**, dan setelah meng-eksekusi
_command_ itu, **Ruby** _interpreter_ dapat diunduh dan di install pada komputer,
saya kira permasalahannya ada di versi **RVM**-nya.




>    RVM Ruby Interpreter Ubuntu CLI
