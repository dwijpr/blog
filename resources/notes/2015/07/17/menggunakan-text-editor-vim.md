Menggunakan Penyunting Teks VIM
===============================

Vim adalah salah satu perangkat lunak komputer yang termasuk ke dalam golongan
_text editor_ bersama dengan gedit dan notepad. Teks disini bersifat biasa atau
dikenal dengan istilah _plain text_. Jadi konten teks yang kita lihat sesuai
dengan isi sebenarnya yang ada pada berkas, hal ini berbeda dengan berkas teks
yang terformat seperti yang biasa disunting menggunakan _word processor_ atau 
program yang biasa kita gunakan seperti **Microsoft Word** atau 
**LibreOffice Writer**.

_Software_ ini merupakan salah satu penyunting teks favorit saya selain 
**Sublime Text**. Sayangnya program ini terlalu kompleks untuk saya gunakan
sehari-hari. Namun selain mengedit kode program yang saya biasa lakukan sehari
-hari keperluan mengedit teks saya sering menggunakan program ini.

Kompleks yang saya maksud disini adalah fitur yang dibutuhkan setiap program
penyunting teks pasti bisa ditemui pada _software_ ini. Namun yang saya rasakan
adalah, beberapa perintah terlalu sulit dilakukan untuk melakukan hal sederhana.
Saat ini yang saya lakukan adalah memperbanyak pengetahuan tentang program ini
sehingga nantinya saya tidak memerlukan program penyunting teks lain. Untuk saat
ini **Sublime Text** masih menjadi pilihan utama untuk mengedit kode program.

Meng-_install_ sistem operasi cukup sering saya lakukan, entah dikarenakan
terjadi _error_ pada sistem operasi karena salah dalam setting konfigurasi yang
dilakukan oleh saya sendiri, atau distro baru yang ingin dicoba, dan berbagai
macam alasan yang terpaksa harus melakukan install dari awal. Perlunya mengedit
file-file konfigurasi maka penyunting teks **VIM** inilah yang saya install
pertama kali. Pada sistem operasi yang biasa saya gunakan, menginstall vim dapat
dilakukan dengan cukup mudah yaitu dengan cara

```bash
$ sudo apt-get install vim-gnome
```

tidak seperti program penyunting teks biasa, **VIM** memerlukan konfigurasi awal.
Salah satunya adalah dengan membuat file **.vimrc** yang biasa terletak pada _home_
direktori. File ini akan dieksekusi pada saat awal penggunaan **VIM** sebelum program
mulai digunakan. **VIM** akan terkonfigurasi sesuai dengan script yang ada pada file
tersebut. Berikut adalah script **.vimrc** yang saya gunakan

<div class="highlight-wrapper">
<div class="highlight" style="background: #ffffff"><pre style="line-height: 125%"><span style="color: #A90D91">set</span> <span style="color: #A90D91">tabstop</span>=<span style="color: #1C01CE">4</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">shiftwidth</span>=<span style="color: #1C01CE">4</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">expandtab</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">number</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">relativenumber</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">autoindent</span>
<span style="color: #A90D91">colorscheme</span> elflord
</pre></div>
</div>
