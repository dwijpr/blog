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

```
$ sudo apt-get install vim-gnome
```

tidak seperti program penyunting teks biasa, **VIM** memerlukan konfigurasi awal.
Salah satunya adalah dengan membuat file **.vimrc** yang biasa terletak pada _home_
direktori. File ini akan dieksekusi pada saat awal penggunaan **VIM** sebelum program
mulai digunakan. **VIM** akan terkonfigurasi sesuai dengan script yang ada pada file
tersebut. Berikut adalah script **.vimrc** yang saya gunakan

<div class="highlight-wrapper">
<div class="highlight" style="background: #ffffff"><pre style="line-height: 125%"><span style="color: #177500">&quot; An example for a vimrc file.</span>
<span style="color: #177500">&quot;</span>
<span style="color: #177500">&quot; Maintainer: Bram Moolenaar &lt;Bram@vim.org&gt;</span>
<span style="color: #177500">&quot; Last change:    2014 Feb 05</span>
<span style="color: #177500">&quot;</span>
<span style="color: #177500">&quot; To use it, copy it to</span>
<span style="color: #177500">&quot;     for Unix and OS/2:  ~/.vimrc</span>
<span style="color: #177500">&quot;       for Amiga:  s:.vimrc</span>
<span style="color: #177500">&quot;  for MS-DOS and Win32:  $VIM\_vimrc</span>
<span style="color: #177500">&quot;     for OpenVMS:  sys$login:.vimrc</span>

<span style="color: #177500">&quot; When started as &quot;evim&quot;, evim.vim will already have done these settings.</span>
<span style="color: #A90D91">if</span> <span style="color: #A90D91">v</span>:progname =~? <span style="color: #C41A16">&quot;evim&quot;</span>
  <span style="color: #A90D91">finish</span>
<span style="color: #A90D91">endif</span>

<span style="color: #177500">&quot; Use Vim settings, rather than Vi settings (much better!).</span>
<span style="color: #177500">&quot; This must be first, because it changes other options as a side effect.</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">nocompatible</span>

<span style="color: #177500">&quot; allow backspacing over everything in insert mode</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">backspace</span>=indent,<span style="color: #A90D91">eol</span>,<span style="color: #A90D91">start</span>

<span style="color: #A90D91">if</span> has(<span style="color: #C41A16">&quot;vms&quot;</span>)
  <span style="color: #A90D91">set</span> <span style="color: #A90D91">nobackup</span>      <span style="color: #177500">&quot; do not keep a backup file, use versions instead</span>
<span style="color: #A90D91">else</span>
  <span style="color: #A90D91">set</span> <span style="color: #A90D91">backup</span>        <span style="color: #177500">&quot; keep a backup file (restore to previous version)</span>
  <span style="color: #A90D91">set</span> <span style="color: #A90D91">undofile</span>      <span style="color: #177500">&quot; keep an undo file (undo changes after closing)</span>
<span style="color: #A90D91">endif</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">history</span>=<span style="color: #1C01CE">50</span>      <span style="color: #177500">&quot; keep 50 lines of command line history</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">ruler</span>       <span style="color: #177500">&quot; show the cursor position all the time</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">showcmd</span>     <span style="color: #177500">&quot; display incomplete commands</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">incsearch</span>       <span style="color: #177500">&quot; do incremental searching</span>

<span style="color: #177500">&quot; For Win32 GUI: remove &#39;t&#39; flag from &#39;guioptions&#39;: no tearoff menu entries</span>
<span style="color: #177500">&quot; let &amp;guioptions = substitute(&amp;guioptions, &quot;t&quot;, &quot;&quot;, &quot;g&quot;)</span>

<span style="color: #177500">&quot; Don&#39;t use Ex mode, use Q for formatting</span>
map Q gq

<span style="color: #177500">&quot; CTRL-U in insert mode deletes a lot.  Use CTRL-G u to first break undo,</span>
<span style="color: #177500">&quot; so that you can undo CTRL-U after inserting a line break.</span>
<span style="color: #A90D91">inoremap</span> &lt;C-U&gt; &lt;C-G&gt;<span style="color: #A90D91">u</span>&lt;C-U&gt;

<span style="color: #177500">&quot; In many terminal emulators the mouse works just fine, thus enable it.</span>
<span style="color: #A90D91">if</span> has(<span style="color: #C41A16">&#39;mouse&#39;</span>)
  <span style="color: #A90D91">set</span> <span style="color: #A90D91">mouse</span>=<span style="color: #A90D91">a</span>
<span style="color: #A90D91">endif</span>

<span style="color: #177500">&quot; Switch syntax highlighting on, when the terminal has colors</span>
<span style="color: #177500">&quot; Also switch on highlighting the last used search pattern.</span>
<span style="color: #A90D91">if</span> &amp;<span style="color: #A90D91">t_Co</span> &gt; <span style="color: #1C01CE">2</span> || has(<span style="color: #C41A16">&quot;gui_running&quot;</span>)
  <span style="color: #A90D91">syntax</span> <span style="color: #A90D91">on</span>
  <span style="color: #A90D91">set</span> <span style="color: #A90D91">hlsearch</span>
<span style="color: #A90D91">endif</span>

<span style="color: #177500">&quot; Only do this part when compiled with support for autocommands.</span>
<span style="color: #A90D91">if</span> has(<span style="color: #C41A16">&quot;autocmd&quot;</span>)

<span style="color: #177500">  &quot; Enable file type detection.</span>
<span style="color: #177500">  &quot; Use the default filetype settings, so that mail gets &#39;tw&#39; set to 72,</span>
<span style="color: #177500">  &quot; &#39;cindent&#39; is on in C files, etc.</span>
<span style="color: #177500">  &quot; Also load indent files, to automatically do language-dependent indenting.</span>
<span style="color: #177500">  &quot; filetype plugin indent on</span>

<span style="color: #177500">  &quot; Put these in an autocmd group, so that we can delete them easily.</span>
  augroup vimrcEx
  <span style="color: #A90D91">au</span>!

<span style="color: #177500">  &quot; For all text files set &#39;textwidth&#39; to 78 characters.</span>
  autocmd <span style="color: #A90D91">FileType</span> text,markdown <span style="color: #A90D91">setlocal</span> <span style="color: #A90D91">textwidth</span>=<span style="color: #1C01CE">78</span>

<span style="color: #177500">  &quot; When editing a file, always jump to the last known cursor position.</span>
<span style="color: #177500">  &quot; Don&#39;t do it when the position is invalid or when inside an event handler</span>
<span style="color: #177500">  &quot; (happens when dropping a file on gvim).</span>
<span style="color: #177500">  &quot; Also don&#39;t do it when the mark is in the first line, that is the default</span>
<span style="color: #177500">  &quot; position when opening a file.</span>
  autocmd <span style="color: #A90D91">BufReadPost</span> *
    \ <span style="color: #A90D91">if</span> line(<span style="color: #C41A16">&quot;&#39;\&quot;&quot;</span>) &gt; <span style="color: #1C01CE">1</span> &amp;&amp; line(<span style="color: #C41A16">&quot;&#39;\&quot;&quot;</span>) &lt;= line(<span style="color: #C41A16">&quot;$&quot;</span>) |
    \   exe <span style="color: #C41A16">&quot;normal! g`\&quot;&quot;</span> |
    \ <span style="color: #A90D91">endif</span>

  augroup END

<span style="color: #A90D91">else</span>

  <span style="color: #A90D91">set</span> <span style="color: #A90D91">autoindent</span>        <span style="color: #177500">&quot; always set autoindenting on</span>

<span style="color: #A90D91">endif</span> <span style="color: #C41A16">&quot; has(&quot;</span>autocmd&quot;)

<span style="color: #177500">&quot; Convenient command to see the difference between the current buffer and the</span>
<span style="color: #177500">&quot; file it was loaded from, thus the changes you made.</span>
<span style="color: #177500">&quot; Only define it when not defined already.</span>
<span style="color: #A90D91">if</span> !exists(<span style="color: #C41A16">&quot;:DiffOrig&quot;</span>)
  command DiffOrig <span style="color: #A90D91">vert</span> <span style="color: #A90D91">new</span> | <span style="color: #A90D91">set</span> <span style="color: #A90D91">bt</span>=nofile | <span style="color: #A90D91">r</span> ++edit # | <span style="color: #1C01CE">0</span>d_ | <span style="color: #A90D91">diffthis</span>
          \ | <span style="color: #A90D91">wincmd</span> <span style="color: #A90D91">p</span> | <span style="color: #A90D91">diffthis</span>
<span style="color: #A90D91">endif</span>

<span style="color: #A90D91">set</span> <span style="color: #A90D91">tabstop</span>=<span style="color: #1C01CE">4</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">shiftwidth</span>=<span style="color: #1C01CE">4</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">expandtab</span>

<span style="color: #A90D91">set</span> <span style="color: #A90D91">number</span>
<span style="color: #A90D91">set</span> <span style="color: #A90D91">relativenumber</span>

<span style="color: #A90D91">set</span> <span style="color: #A90D91">autoindent</span>

<span style="color: #A90D91">colorscheme</span> elflord

<span style="color: #177500">&quot;set foldcolumn=4</span>

execute pathogen#infect()

<span style="color: #A90D91">let</span> <span style="color: #A90D91">g</span>:netrw_bufsettings = <span style="color: #C41A16">&#39;nu relativenumber&#39;</span>

autocmd <span style="color: #A90D91">BufNewFile</span>,<span style="color: #A90D91">BufRead</span> *.md <span style="color: #A90D91">set</span> <span style="color: #A90D91">filetype</span>=markdown
</pre></div>
</div>
