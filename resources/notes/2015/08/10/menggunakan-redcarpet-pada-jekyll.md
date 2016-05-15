Menggunakan RedCarpet Pada Jekyll
=================================

Menulis baris contoh _code_ pada penyunting teks **SublimeText** dengan
menggunakan **Jekyll** sebagai permukaan penulisan artikel saya untuk _blog_,
memunculkan masalah baru bagi saya setelah menemukan plugin bernama
**Markdown Extended** yang mana membuat _syntax coloring_ menjadi nyata
langsung saat menulis kode tersebut pada _text editor_ ini.

Kurang lebih kode akan terlihat seperti berikut...

<img src="{{ asset('images/triple-backtick-language-name.png') }}">

Namun sayangnya, jekyll yang masih polos tidak bisa mem-_parsing_ _language name_
yang ada di belakang _triple backtick_ _```**js**_.

## Pokok Permasalahan

Jadi inti permasalahan yang ada disini adalah, keindahan yang didapat dari hasil
kombinasi **SublimeText** dengan _plugin_nya **Makrdown Extended** (screenshoot
diatas), tidak akan bisa dinikmati pada saat blog di_parsing_ dan _language name_nya
tidak menjadi kode **html** dan malah merusak kode sebenarnya, sedangkan untuk
melihat _syntax coloring_nya langsung pada _text editor_ memerlukan _language name_
tersebut sehingga akan sesuai dengan bahasa yang disebutkan.

<img src="{{ asset('images/output-js.png') }}">

## Solusi

Setelah beberapa saat mencari, saya berhasil mengatasi masalah ini. Seperti
judul artikel ini, RedCarpet (gem ruby), telah membantu saya untuk mem_parsing_
_language name_ yang ada dibelakang _triple backtick_ menjadi seperti berikut ...

<img src="{{ asset('images/html-redcarpet.png') }}">

_Language name_ yang tadinya tidak ter-_parse_ oleh jekyll sekarang menjadi kode
html yang lebih komplek, dari yang tadinya hanya berupa _tag_ **code** diikuti
_language name_-nya.

<hr>


>   RedCarpet Jekyll SublimeText MarkdownExtended
