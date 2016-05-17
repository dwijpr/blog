Terminal Output Menjadi HTML Menggunakan AHA
============================================

Sering bekerja menggunakan terminal? Ada _output_ yang perlu dijadikan
sebagai bahan presentasi atau sekedar _share_ informasi dengan teman?
Bisa saja _text output_ yang didapatkan dari terminal di-_copy_ dan _paste_
atau dengan cara _screenshot_ yang akhirnya menjadi sebuah gambar.

Cara _copy paste_ text mungkin menjadi cara paling mudah ketika ingin
berbagi hasil _output terminal_, namun akan menjadi sulit terbaca ketika
_platform_ tempat berbagi memformat teks tersebut. _Screenshot_ juga
merupakan cara yang cukup baik untuk ini, orang yang mendapatkan informasi
juga melihat presentasi yang sama dengan apa yang terjadi pada layar,
namun teks tidak dapat dengan mudah digunakan kembali (tidak bisa di
_copy paste_).

Setelah mencari alternatif dengan keadaan yang saya alami saat itu,
saya menemukan program **AHA**, **AHA** 
adalah singkatan dari _Ansi Html Adapter_, sebuah program yang
saya temukan pada sistem operasi Ubuntu. Cara penggunaannya pun
cukup sederhana, tidak kalah simpel dibandingkan dengan cara
_copy paste_ atau _screenshot_. Cukup dengan mengetikan sebaris
perintah pada terminal seperti,

```bash
$ ls -la --color=always | aha > ls.html
```
<pre>
total 28
drwxrwxr-x  2 dwi dwi 4096 Nov 24 15:55 <span style="color:blue;font-weight:bold;">.</span>
drwxrwxr-x 13 dwi dwi 4096 Des  5 09:15 <span style="color:blue;font-weight:bold;">..</span>
-rw-rw-r--  1 dwi dwi  248 Sep  8 16:18 default.html
-rw-rw-rw-  1 dwi dwi   14 Nov 24 15:55 empty.html
-rw-rw-rw-  1 dwi dwi 1041 Sep  8 16:52 front.html
-rw-rw-r--  1 dwi dwi  207 Agu  9 09:07 page.html
-rw-rw-r--  1 dwi dwi  156 Jul 31 20:48 post.html
</pre>

```bash
$ tree -C _includes/ | aha > tree.html
```

<pre>
<span style="color:blue;font-weight:bold;">_includes/</span>
├── footer.html
├── ganteng.html
├── header.html
├── head.html
└── <span style="color:blue;font-weight:bold;">styles</span>
    └── style1.html

1 directory, 5 files
</pre>

Program ini mengubah _terminal output_ kedalam bentuk **html**, bisa
juga mendapatkan warna/gaya _font_ sebagai _inline style_ pada dokumen.

<hr>

>    _aha_ _AnsiHTMLAdapter_ _linux_ _ubuntu_
