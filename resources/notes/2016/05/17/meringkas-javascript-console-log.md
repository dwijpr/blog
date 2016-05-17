Meringkas JavaScript Console Log
================================

**console.log** merupakan salah satu fungsi dari javascript yang berguna untuk
proses _debugging_. Menurut saya menulis **console.log** berulang kali merupakan
hal yang cukup melelahkan, jadi saya mencoba untuk membungkus kembali fungsi ini
dan men-_setting_-nya menjadi seperti yang saya inginkan. Paling tidak saya ingin
menyingkat **console.log** menjadi sesuatu yang lebih pendek seperti hanya
menuliskan **d(logThis)**.

Yang bisa dilakukan untuk mendapatkan hal ini adalah dengan cara sebagai berikut

```js
var d = console.log;
```

dan mencobanya dengan menulis

```js
d('something');
```

tapi tampil error dengan pesan seperti <span class="text-danger">
Uncaught TypeError: Illegal invocation(…)A</span>, maka cara diatas tidak bisa
dilakukan. Hal ini dikarenakan didalam fungsi **console.log** bergantung pada
_keyword_ **this**, dan ketika di_assign_ kepada ```var d```, **this** != (object)
**console**.

#### Fungsi bind

**Function#bind** dapat memecahkan masalah seperti ini. Fungsi ini berfungsi untuk
meng-_assign_ variabel **this** dengan _object_ yang sesuai, dalam kasus ini
adalah objek **window.console** atau **console**.

```js
var d = console.log.bind(console);
d('something', 'written');
```

>    javascript function console.log debug browser
