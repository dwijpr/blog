Menambah Ukuran File Upload Pada Aplikasi Berbasis PHP dan Nginx
================================================================

Meng-_upload_ _file_ pada aplikasi berbasis **PHP** dan **Nginx** akan terbentur
dengan masalah ukuran file yang akan diunggah. Batas ukuran dari berkas yang akan
diunggah akan menurut pada konfigurasi pada kedua platform yang digunakan. Sehingga
konfigurasi dari kedua _software_ tersebut harus dimodifikasi sehingga berkas
dengan ukuran yang lebih besar dapat diunggah.

Pertama-tama ketika mulai meng-_upload_ berkas yang berukuran cukup besar maka
**Nginx** akan memberikan pesan _error_ seperti berikut

<img class="img-responsive center-block" src="{{ asset('images/other/nginx-413-request.png') }}">

Hal ini dikarenakan oleh konfigurasi _default_ **Nginx**

<pre>
Syntax:     client_max_body_size size;
Default:    client_max_body_size 1m;
Context:    http, server, location
</pre>

Masalah batasan ukuran _file upload_ dapat diatasi dengan cara mengganti nilai
dari **client_max_body_size** ke 0, yang berarti tidak ada batasan ukuran untuk
berkas yang akan diunggah.

<pre>
client_max_body_size 0;
</pre>

Berikutnya adalah bagian **PHP**, **PHP** memiliki konfigurasi sendiri mengenai
batasan _file upload_-nya. **PHP** yang digunakan bersama dengan **Nginx** sedikit
berbeda ketika digunakan bersama **Apache**, **PHP** yang dimaksud adalah **PHP-FPM**.
**FPM** memiliki **php.ini** sendiri pada ```/etc/php5/fpm/php.ini``` (ubuntu).
Cari setting untuk **upload_max_filesize**, **post_max_size** dan ganti nilainya menjadi **0**.
Tidak ada dokumentasi tentang jika mengubah nilainya menjadi **0** maka tidak ada
batasan untuk _file upload_-nya tetapi ketika saya coba menggantinya menjadi **0**
berkas yang berukuran lebih besar menjadi bisa diunggah.

<pre>
; Maximum allowed size for uploaded files.
; http://php.net/upload-max-filesize
upload_max_filesize = 0

; Maximum size of POST data that PHP will accept.
; Its value may be 0 to disable the limit. It is ignored if POST data reading
; is disabled through enable_post_data_reading.
; http://php.net/post-max-size
post_max_size = 0
</pre>

Sebuah setting terakhir dari **PHP-FPM** untuk dapat mengijinkan mengunggah file
yang besar yaitu, **memory_limit**, nilai awal dari setting ini adalah **128M**
yang berarti MB (MegaByte), jika nilai yang diinginkan lebih besar nilainya bisa
diganti dengan **10G** yang berarti **10 GigaByte**.

<pre>
; Maximum amount of memory a script may consume (128MB)
; http://php.net/memory-limit
memory_limit = 10G
</pre>

>    #PHP #Nginx #Upload #PHP-FPM #php.ini
