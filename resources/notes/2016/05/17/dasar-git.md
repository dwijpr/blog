Dasar Git
=========

<blockquote>
    <p>
        <b>Git</b> adalah perangkat lunak pengontrol versi atau 
        proyek manajemen kode
        perangkat lunak yang diciptakan oleh <b>Linus Torvalds</b>
        , yang awalnya ditujukan
        untuk pengembangan kernel Linux.
    </p>
    <footer>
        Wikipedia
        ~
        <a href="https://id.wikipedia.org/wiki/Git"><cite title="Source Title">
            link
        </cite></a>
    </footer>
</blockquote>

**Git** merupakan salah satu dari _version control software_ dari sekian banyak
_version control_ seperti **RCS**, **CVS**, **SVN**, **Bazaar**, **Mercurial**.
**Git** juga salah satu dari _version control_ yang _distributed_ atau sering
disebut dengan **DVCS** (_Distributed Version Control Systems_). **Git** adalah
_version control_ yang paling sering saya gunakan untuk pekerjaan saat ini.

####Hampir semua pekerjaan dapat dilakukan secara lokal

Selama ada program **Git** terinstall dikomputer maka komputer lain / _server_
seperti tidak dibutuhkan saat itu. Untuk dapat menikmati fitur _version control_
dari **Git** ini dan tidak sedang bekerja bersama orang lain maka sebuah komputer
saja cukup untuk ini. Data **Git** yang ada pada komputer merupakan _repository_
, hal ini berarti semua data terdapat pada _repository_ tersebut, dengan kata
lain, yang ada pada komputer tersebut juga merupakan _server_. Selama pengerjaan
secara lokal dilakukan tentunya _internet_ tidak diperlukan saat itu.

####Tiga Bagian Penting Git

Beberapa waktu lalu saya mendapati ada tahap _staged_ pada **Git**, namun pada
saat itu sepengetahuan saya tidak ada _command_ untuk men-_stage_ berkas. Setelah
membaca dokumentasi tentang **Git** kembali, ternyata memang ada 3 tahap yaitu
**.git directory**, **working directory**, **staging area**.

#####.git directory
Pada sebuah proyek yang terintegrasi dengan **Git** maka pada _root_ proyek
tersebut akan memiliki sebuah direktori **.git**. Didalam direktori itulah semua
data mengenai _version control_ disimpan, direktori ini juga yang akan ada pada
komputer lain pada saat _clone_ dilakukan.

#####working directory
Pada sebuah _version control software_ maka akan ada yang disebut dengan istilah
versi, dan itu akan terdapat beberapa versi. **Working directory** merupakan
sebuah versi dari beberapa versi yang ada pada _version control_. Berkas-berkas
yang ada pada **working directory** merupakan berkas yang akan digunakan langsung
untuk proses pengerjaan proyek (edit, hapus, tambah).

#####staging area
Adalah sebuah berkas yang berada pada **.git** direktori, yang menyimpan informasi
tentang apa saja yang berubah untuk di-_commit_.

Jadi secara singkat, alur tentang dasar **git** ini adalah sebagai berikut:
1. Berkas-berkas pada **working directory** telah mendapatkan perubahan.
2. Berkas-berkas tersebut di-**_stage_**, hingga kemudian **git** mengetahui 
perubahaan apa saja yang terjadi.
3. Pada tahap _stage_ perubahan direkam secara sementara, perlu dilakukan _commit_
untuk menyimpan perubahan secara permanen dan kembali informasi ini disimpan pada
**staging area**.

>   git versionControl openSource
