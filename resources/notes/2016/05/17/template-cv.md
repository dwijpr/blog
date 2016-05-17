Template CV
===========

CV merupakan singkatan dari _Curriculum Vitae_ yang berarti **daftar riwayat hidup**
adalah dokumen yang memberikan gambaran mengenai pengalaman seseorang dan kualifikasi
lainnya. Di beberapa negara, suatu CV biasanya merupakan hal utama yang dijumpai
seorang _employee_ potensial tentang pencari kerja dan sering digunakan untuk menyaring
aplikan ketika mencari pekerjaan, biasanya dilanjutkan dengan wawancara.

Disini saya telah menyediakan sebuah _template_ yang nantinya akan tampak seperti
ini,

<table>
    <tr>
        <td>
            <img class="img-responsive" src="{{ asset('images/cvs/dwi.png') }}">
        </td>
        <td>
            <img class="img-responsive" src="{{ asset('images/cvs/emma.png') }}">
        </td>
    </tr>
</table>

Yang diperlukan disini adalah:

- Membuat folder di dalam direktori __/data__
- Menambahkan ```data.json``` + ```user.png```
- Mengganti config pada data.json -> ```for``` : sesuai nama folder pada
perintah #1

Opsional:
- Menjalankan script php dengan built-in php Server:

```bash
    $php -S localhost:8081
```

### Membuat Menjadi PDF

```bash
    $wkhtmltopdf http://localhost:8081/ cv.pdf
```

<div>
    <a href="https://github.com/dwijpr/cv-template" target="_blank">Github source</a>
    <br>
    <a 
        href="https://github.com/dwijpr/cv-template/blob/master/pdf-samples/cv-dwi.pdf"
        target="_blank"
    >
    Sample PDF
    </a>
</div>



>    #cv #curriculumVitae #wkhtmltopdf #PHP #cli #JSON
