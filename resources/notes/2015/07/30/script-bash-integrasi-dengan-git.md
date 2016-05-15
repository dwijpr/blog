Script Bash Integrasi dengan Git
================================

Sehari-hari saya menggunakan **gnome-terminal** untuk melakukan pekerjaan
saya. Selain itu saya juga hampir selalu menggunakan program untuk
mengontrol versi kode yang dikenal dengan **Git**. Lalu, 
muncul keinginan untuk mengintegrasikan keduanya, 
bagaimana agar kedua
program ini bisa terintegrasi sehingga dapat mempermudah pekerjaan saya?

##### _Begin with the End_

Nantinya **gnome-terminal** akan mampu mendeteksi apakah dia berada pada sebuah 
direktori yang terhubung dengan **Git** atau tidak, mampu mendeteksi nama _branch_
yang sedang digunakan, dan juga mampu medeteksi _state_ dari _branch_
tersebut.

<div id="bash-git-video-wrapper">
    <style>
        #bash-git-video-wrapper{
            max-width: 100%;
            overflow-x: auto;
            text-align: center;
        }
        #bash-git-video-wrapper video{
            display: inline-block;
        }
    </style>

    <video width="550" height="300" controls>
      <source src="{{ asset('videos/bash-git.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
</div>

Pertama-tama _script_ dimulai dengan memodifikasi tampilan **bash prompt**, yang biasa nya terlihat seperti

```
user@comp:~$ █
```

menjadi seperti

```
( ~ ) > █
```

Membuat _function_ menggunakan **bash script** dapat dilakukan dengan cara seperti
biasa menulis program menggunakan bahasa pemrograman lainnya.

```
function _prompt_command(){
}
```

Untuk mengubah tampilan _prompt_ diperlukan variabel **bash** yang dikenal dengan
_identifier_ ```PS1```. Cara _assign_ nilai pada variabel **bash** memerlukan
kata kunci ```export```. Membuat tampilan ```( ~ )``` faktanya memerlukan kode
yang cukup panjang sehingga saya memisah _assign_ nilai variabel ```PS1```
ini dengan cara _append_ nilai ke variabel. Fungsi lengkap nya akan tampak seperti ini

<div class="highlight" style="background: #ffffff"><pre style="line-height: 125%">
<span style="color: #A90D91">function</span> _prompt_command<span style="color: #000000">()</span> <span style="color: #000000">{</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=</span><span style="color: #C41A16">&#39;\n\[\e[1;31m\]( &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[1;33m\]\W \[\e[1;31m\]) &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[1;32m\]&gt; &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[0m\] &#39;</span>
<span style="color: #000000">}</span>
<span style="color: #000000">PROMPT_COMMAND=</span>_prompt_command
</pre></div>


Langkah selanjutnya adalah menambahkan integrasi ke **Git**. Supaya lebih rapi
saya membuat sebuah fungsi lagi khusus untuk fungsionalitas deteksi **Git** ini.
Dan nantinya fungsi tersebut dapat dengah mudah dimasukan kedalam fungsi 
<em>_promp_command</em>.


<div class="highlight" style="background: #ffffff"><pre style="line-height: 125%">
<span style="color: #A90D91">function</span> _prompt_command<span style="color: #000000">()</span> <span style="color: #000000">{</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=</span><span style="color: #C41A16">&#39;\n\[\e[1;31m\]( &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[1;33m\]\W \[\e[1;31m\]) &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16;font-size: 18px !important;">&quot;`_git_prompt`&quot;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[1;32m\]&gt; &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[0m\] &#39;</span>
<span style="color: #000000">}</span>
<span style="color: #000000">PROMPT_COMMAND=</span>_prompt_command
</pre></div>

Keseluruhan kode yang dapat digunakan, dan tinggal ditambahkan ke akhir berkas _.bashrc_
akan tampak seperti berikut

<div class="highlight" style="background: #ffffff"><pre style="line-height: 125%"><span style="color: #177500"># ====================================================================</span>

<span style="color: #A90D91">function</span> _git_prompt<span style="color: #000000">()</span> <span style="color: #000000">{</span>
    <span style="color: #A90D91">local </span><span style="color: #000000">git_status=</span><span style="color: #C41A16">&quot;`git status -unormal 2&gt;&amp;1`&quot;</span>
    <span style="color: #A90D91">if</span> ! <span style="color: #000000">[[</span> <span style="color: #C41A16">&quot;</span><span style="color: #000000">$git_status</span><span style="color: #C41A16">&quot;</span> <span style="color: #000000">=</span>~ Not<span style="color: #C41A16">\ </span>a<span style="color: #C41A16">\ </span>git<span style="color: #C41A16">\ </span>repo <span style="color: #000000">]]</span>; <span style="color: #A90D91">then</span>
        <span style="color: #A90D91">if</span> <span style="color: #000000">[[</span> <span style="color: #C41A16">&quot;</span><span style="color: #000000">$git_status</span><span style="color: #C41A16">&quot;</span> <span style="color: #000000">=</span>~ nothing<span style="color: #C41A16">\ </span>to<span style="color: #C41A16">\ </span>commit <span style="color: #000000">]]</span>; <span style="color: #A90D91">then</span>
            <span style="color: #A90D91">local </span><span style="color: #000000">ansi=</span>42
        <span style="color: #A90D91">elif</span> <span style="color: #000000">[[</span> <span style="color: #C41A16">&quot;</span><span style="color: #000000">$git_status</span><span style="color: #C41A16">&quot;</span> <span style="color: #000000">=</span>~ nothing<span style="color: #C41A16">\ </span>added<span style="color: #C41A16">\ </span>to<span style="color: #C41A16">\ </span>commit<span style="color: #C41A16">\ </span>but<span style="color: #C41A16">\ </span>untracked<span style="color: #C41A16">\ </span>files<span style="color: #C41A16">\ </span>present <span style="color: #000000">]]</span>; <span style="color: #A90D91">then</span>
            <span style="color: #A90D91">local </span><span style="color: #000000">ansi=</span>43
        <span style="color: #A90D91">else</span>
            <span style="color: #A90D91">local </span><span style="color: #000000">ansi=</span>41
        <span style="color: #A90D91">fi</span>
        <span style="color: #A90D91">if</span> <span style="color: #000000">[[</span> <span style="color: #C41A16">&quot;</span><span style="color: #000000">$git_status</span><span style="color: #C41A16">&quot;</span> <span style="color: #000000">=</span>~ On<span style="color: #C41A16">\ </span>branch<span style="color: #C41A16">\ </span><span style="color: #000000">([</span>^<span style="color: #000000">[</span>:space:<span style="color: #000000">]]</span>+<span style="color: #000000">)</span> <span style="color: #000000">]]</span>; <span style="color: #A90D91">then</span>
            <span style="color: #000000">branch=</span><span style="color: #C41A16">${</span><span style="color: #000000">BASH_REMATCH</span>[1]<span style="color: #C41A16">}</span>
        <span style="color: #A90D91">else</span>
            <span style="color: #000000">branch=</span><span style="color: #C41A16">&quot;(`git describe --all --contains --abbrev=4 HEAD 2&gt; /dev/null ||</span>
<span style="color: #C41A16">                echo HEAD`)&quot;</span>
        <span style="color: #A90D91">fi</span>
        <span style="color: #A90D91">echo</span> -n <span style="color: #C41A16">&#39;\[\e[0;37;&#39;&quot;</span><span style="color: #000000">$ansi</span><span style="color: #C41A16">&quot;&#39;;1m\]&#39;&quot; </span><span style="color: #000000">$branch</span><span style="color: #C41A16"> &quot;&#39;\[\e[0m\] &#39;</span>
    <span style="color: #A90D91">fi</span>
<span style="color: #000000">}</span>

<span style="color: #A90D91">function</span> _prompt_command<span style="color: #000000">()</span> <span style="color: #000000">{</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=</span><span style="color: #C41A16">&#39;\n\[\e[1;31m\]( &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[1;33m\]\W \[\e[1;31m\]) &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&quot;`_git_prompt`&quot;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[1;32m\]&gt; &#39;</span>
    <span style="color: #A90D91">export </span><span style="color: #000000">PS1=$PS1</span><span style="color: #C41A16">&#39;\[\e[0m\] &#39;</span>
<span style="color: #000000">}</span>
<span style="color: #000000">PROMPT_COMMAND=</span>_prompt_command

<span style="color: #177500"># ====================================================================</span>
<span style="color: #177500"># Git Integration</span>
<span style="color: #177500"># ====================================================================</span>
</pre></div>

Saya sebenarnya belum terlalu men-_debug_ fungsi <em>&#95;git_prompt</em>, kode
tersebut merupakan hasil _pengembaraan_ saya di **Google**, sudah cukup lama
sehingga saya lupa sumber aslinya. Seluruh tampilan karakter dalam variabel
```PS1``` juga bisa diubah, dan disesuaikan dengan keinginan.