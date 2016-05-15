Mencoba _Bit Field_
===================

Beberapa waktu lalu saya mencari dan mencoba memahami tentang salah satu konsep
pemrograman yang sebenarnya sudah saya ketahui beberapa waktu lalu namun belum
sepenuhnya paham dan belum sempat untuk mengimplementasikannya pada sebuah
kasus. Setelah beberapa kali membaca dari sumber-sumber yang saya dapat, artikel
ini akan membahas tentang _bit field_ menurut se-_penangkap_-an saya ...

**Bit Field** adalah istilah yang digunakan pada pemrograman komputer untuk pemetaan bidang pada sebuah data yang direpresentasikan dengan sebuah angka (_integral_) dimana nantinya akan ditranslasi menjadi bilangan biner sehingga akan tampak _fields_ yang dimaksud, setiap _bit_ yang dialamatkan memiliki artian khusus menurut dengan rancangan logika pembuat kode.

Untuk lebih jelasnya bisa diambil contoh untuk implementasi _bit field_ ini. Contoh yang akan saya gunakan adalah tentang sistem ijin sistem operasi berbasis linux. Bisa dilihat melalui perintah

```
$ chmod 777 file.txt
```

dari _man page_ **chmod** program tersebut berfungsi untuk mengganti _file mode
bits_. Dari angka 777 tersebut bisa diambil salah satunya saja yaitu angka 7,
angka 7 disini memiliki arti nilai dari user memiliki akses untuk _read_, _write_,
_execute_ (**rwx**). Bagaimana mungkin yang tadinya hanya sebuah angka 7, dapat
diartikan menjadi _user_ diberikan ijin untuk dapat membaca, memperbaharui, dan mengeksekusi file tersebut? Angka 7 tersebut merupakan kombinasi dari angka lainnya yaitu 4, 2, dan 1. Saat dilihat dari angka 4, 2, 1 tersebut mungkin belum nampak bagaimana cara **_bit field_**  ini bekerja, namun ketika mengubahnya menjadi bilangan biner maka akan terlihat sesuatu seperti ini.

<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered table-not-full">
            <tr>
                <th>angka</th>
                <th>arti</th>
                <th>biner</th>
            </tr>
            <tr>
                <td class="text-right">4</td>
                <td>read</td>
                <td>
                    <table class="table table-bordered" style="margin: 0;padding: 0;">
                        <tr>
                            <td>1</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="text-right">2</td>
                <td>write</td>
                <td>
                    <table class="table table-bordered" style="margin: 0;padding: 0;">
                        <tr>
                            <td>0</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="text-right">1</td>
                <td>execute</td>
                <td>
                    <table class="table table-bordered" style="margin: 0;padding: 0;">
                        <tr>
                            <td>0</td>
                            <td>0</td>
                            <td>1</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-sm-6 text-center">
        <table class="table table-bordered table-not-full">
            <tr>
                <td>read</td>
                <td>write</td>
                <td>execute</td>
                <th>field</th>
            </tr>
            <tr>
                <td colspan="3" class="text-center">7</td>
                <th>nilai</th>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">1</td>
                <td class="text-center">1</td>
                <th>nilai biner</th>
            </tr>
        </table>
    </div>
</div>

Dari table tersebut dapat terlihat dengan lebih jelas maksud dibalik angka 7
itu. Pada saat dikonversi menjadi bilangan biner angka tersebut akan menjadi
tampak seperti bilangan biner 3 digit -&gt;

<style>
    .biner-wrapper td, .biner-wrapper th{
        padding: 2px 8px;
    }
    .biner-wrapper .separator-or{
        border-top: 1px solid black;
    }
    .biner-wrapper th.biner-represent{
        border-left: 1px solid black;
    }
</style>

<div>
    <table class="biner-wrapper">
        <tr>
            <td>1</td>
            <td>0</td>
            <td>0</td>
            <th class="biner-represent">4</th>
        </tr>
        <tr>
            <td>0</td>
            <td>1</td>
            <td>0</td>
            <th class="biner-represent">2</th>
        </tr>
        <tr>
            <td>0</td>
            <td>0</td>
            <td>1</td>
            <th class="biner-represent">1</th>
            <th rowspan="2">| (or)</th>
        </tr>
        <tr class="separator-or">
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <th class="biner-represent">7</th>
        </tr>
    </table>
</div>

Angka 7 tersebut merupakan hasil dari operasi _bitwise_ seperti kode berikut

```
value = 4|2|1
```

Dengan begitu, hanya sebuah bilangan decimal dapat merepresentasi berbagai macam
arti seperti contoh tersebut. Lalu bagaimana cara mengetahui bahwa nilai angka
tersebut memiliki arti yang seharusnya? Contoh listing kode **PHP** berikut mungkin
akan memberikan gambaran bagaimana cara mem-_parsing_ arti dari sebuah angka
tersebut.

<div class="highlight" style="background: #ffffff"><pre style="line-height: 125%"><span style="color: #633820">&lt;?php</span>
<span style="color: #A90D91">define</span>(<span style="color: #C41A16">&#39;PERMISSION_READ&#39;</span>, <span style="color: #1C01CE">4</span>);
<span style="color: #A90D91">define</span>(<span style="color: #C41A16">&#39;PERMISSION_WRITE&#39;</span>, <span style="color: #1C01CE">2</span>);
<span style="color: #A90D91">define</span>(<span style="color: #C41A16">&#39;PERMISSION_EXECUTE&#39;</span>, <span style="color: #1C01CE">1</span>);

<span style="color: #000000">$value</span> <span style="color: #000000">=</span> <span style="color: #000000">PERMISSION_READ</span> <span style="color: #000000">|</span> <span style="color: #000000">PERMISSION_WRITE</span> <span style="color: #000000">|</span> <span style="color: #000000">PERMISSION_EXECUTE</span>;
<span style="color: #000000">check_permission</span>(<span style="color: #000000">$value</span>);

<span style="color: #000000">$value</span> <span style="color: #000000">=</span> <span style="color: #000000">PERMISSION_READ</span>;
<span style="color: #000000">check_permission</span>(<span style="color: #000000">$value</span>);

<span style="color: #000000">$value</span> <span style="color: #000000">=</span> <span style="color: #000000">PERMISSION_EXECUTE</span>;
<span style="color: #000000">check_permission</span>(<span style="color: #000000">$value</span>);

<span style="color: #000000">$value</span> <span style="color: #000000">=</span> <span style="color: #000000">PERMISSION_READ</span> <span style="color: #000000">|</span> <span style="color: #000000">PERMISSION_READ</span> <span style="color: #000000">|</span> <span style="color: #000000">PERMISSION_EXECUTE</span>;
<span style="color: #000000">check_permission</span>(<span style="color: #000000">$value</span>);

<span style="color: #000000">$value</span> <span style="color: #000000">=</span> <span style="color: #000000">PERMISSION_READ</span> <span style="color: #000000">|</span> <span style="color: #000000">PERMISSION_WRITE</span> <span style="color: #000000">|</span> <span style="color: #000000">PERMISSION_EXECUTE</span>;
<span style="color: #000000">check_permission</span>(<span style="color: #000000">$value</span>);

<span style="color: #A90D91">function</span> <span style="color: #000000">check_permission</span>(<span style="color: #000000">$value</span>){
    <span style="color: #A90D91">echo</span> <span style="color: #C41A16">&quot;representation $value means &quot;</span>;
    <span style="color: #A90D91">echo</span> <span style="color: #000000">$value</span> <span style="color: #000000">&amp;</span> <span style="color: #000000">PERMISSION_READ</span>       <span style="color: #000000">?</span> <span style="color: #C41A16">&quot;r&quot;</span> <span style="color: #000000">:</span> <span style="color: #C41A16">&quot;-&quot;</span>;
    <span style="color: #A90D91">echo</span> <span style="color: #000000">$value</span> <span style="color: #000000">&amp;</span> <span style="color: #000000">PERMISSION_WRITE</span>      <span style="color: #000000">?</span> <span style="color: #C41A16">&quot;w&quot;</span> <span style="color: #000000">:</span> <span style="color: #C41A16">&quot;-&quot;</span>;
    <span style="color: #A90D91">echo</span> <span style="color: #000000">$value</span> <span style="color: #000000">&amp;</span> <span style="color: #000000">PERMISSION_EXECUTE</span>    <span style="color: #000000">?</span> <span style="color: #C41A16">&quot;x&quot;</span> <span style="color: #000000">:</span> <span style="color: #C41A16">&quot;-&quot;</span>;
    <span style="color: #A90D91">echo</span> <span style="color: #C41A16">&quot;\n&quot;</span>;
}
</pre></div>


Yang perlu diketahui adalah saya sebenarnya tidak terlalu meng-_oprek_ kedalam
kode tentang sistem ijin ini. Kemungkinan logika yang dipakai berbeda dengan
pemahaman saya, namun yang saya lihat adalah betapa jelasnya contoh sistem ini
jika bekerja menggunakan konsep _bit field_, jadi saya menggunakan contoh
angka dari salah perintah sistem operasi berbasis linux tersebut.
