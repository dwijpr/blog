Tahap Demi Tahap Menambahkan Navigation Drawer
==============================================

**Navigation Drawer** adalah sebuah panel yang menunjukan navigasi utama sebuah
aplikasi (android) yang berada diujung kiri tampilan. Banyak aplikasi populer
untuk sistem operasi android yang menggunakan menu / _navigation drawer_ ini,
dan menurut saya pribadi, tampilan menu dengan model seperti ini sangat efektif
untuk sebuah aplikasi. Kurang lebih nanti hasilnya akan seperti ini ...

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

    <video width="400" height="250" controls>
      <source src="{{ asset('videos/and-result.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
</div>

Untuk membuat tampilan menu seperti video diatas hanya memerlukan sebuah _class_
**java** dan sebuah _layout_. Untuk memulai langsung saja menuju kode _layout_,
Elemen dengan strata tertinggi pada _layout_ kali ini adalah
```android.support.v4.widget.DrawLayout```

```xml
<android.support.v4.widget.DrawerLayout
    xmlns:android="http://schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:id="@+id/drawer_layout">
...
</android.support.v4.widget.DrawerLayout>
```

Selanjutnya adalah menambahkan elemen ```ListView``` sebagai _drawer_-nya

```xml
<ListView
    android:layout_width="200dp"
    android:layout_height="match_parent"
    android:id="@+id/navList"
    android:layout_gravity="left|start"
    android:background="#ffeeeeee"/>
```

ListView (atau apapun yang _view_ yang digunakan sebagai drawer), sebaiknya tidak
lebih dari 320dp untuk atribut ```android:layout_width``` - nya, sehingga
kemunculan _drawer_ tidak akan menutup seluruh permukaan aplikasi.

Supaya tampilan sama berikut adalah kode lengkap untuk _layout_-nya ...

<div class="highlight-wrapper" style="max-height: 200px;overflow: auto;">
<div class="highlight"><pre><code class="language-xml" data-lang="xml"><span class="cp">&lt;?xml version="1.0" encoding="utf-8"?&gt;</span>
<span class="nt">&lt;android.support.v4.widget.DrawerLayout</span>
    <span class="na">xmlns:android=</span><span class="s">"http://schemas.android.com/apk/res/android"</span>
    <span class="na">android:layout_width=</span><span class="s">"match_parent"</span>
    <span class="na">android:layout_height=</span><span class="s">"match_parent"</span>
    <span class="na">android:id=</span><span class="s">"@+id/drawer_layout"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;RelativeLayout</span>
        <span class="na">android:layout_width=</span><span class="s">"match_parent"</span>
        <span class="na">android:layout_height=</span><span class="s">"match_parent"</span>
        <span class="na">android:paddingLeft=</span><span class="s">"@dimen/activity_horizontal_margin"</span>
        <span class="na">android:paddingRight=</span><span class="s">"@dimen/activity_horizontal_margin"</span>
        <span class="na">android:paddingTop=</span><span class="s">"@dimen/activity_vertical_margin"</span>
        <span class="na">android:paddingBottom=</span><span class="s">"@dimen/activity_vertical_margin"</span>
        <span class="na">android:background=</span><span class="s">"#ffffffff"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;TextView</span>
            <span class="na">android:layout_width=</span><span class="s">"wrap_content"</span>
            <span class="na">android:layout_height=</span><span class="s">"wrap_content"</span>
            <span class="na">android:layout_centerHorizontal=</span><span class="s">"true"</span>
            <span class="na">android:text=</span><span class="s">"@string/text_main"</span>
            <span class="na">android:textSize=</span><span class="s">"24sp"</span>
            <span class="na">android:gravity=</span><span class="s">"center"</span>
            <span class="na">android:layout_marginTop=</span><span class="s">"100dp"</span><span class="nt">/&gt;</span>
        <span class="nt">&lt;ImageView</span>
            <span class="na">android:layout_width=</span><span class="s">"wrap_content"</span>
            <span class="na">android:layout_height=</span><span class="s">"wrap_content"</span>
            <span class="na">android:src=</span><span class="s">"@android:drawable/sym_def_app_icon"</span>
            <span class="na">android:layout_alignParentBottom=</span><span class="s">"true"</span>
            <span class="na">android:layout_centerHorizontal=</span><span class="s">"true"</span>
            <span class="na">android:contentDescription=</span><span class="s">"@string/gambar_asal"</span> <span class="nt">/&gt;</span>
    <span class="nt">&lt;/RelativeLayout&gt;</span>
    <span class="nt">&lt;ListView</span>
        <span class="na">android:layout_width=</span><span class="s">"200dp"</span>
        <span class="na">android:layout_height=</span><span class="s">"match_parent"</span>
        <span class="na">android:id=</span><span class="s">"@+id/navList"</span>
        <span class="na">android:layout_gravity=</span><span class="s">"left|start"</span>
        <span class="na">android:background=</span><span class="s">"#ffeeeeee"</span><span class="nt">/&gt;</span>
<span class="nt">&lt;/android.support.v4.widget.DrawerLayout&gt;</span>
</code></pre></div>
</div>

Setelah _layout_-nya selesai, sekarang saatnya untuk memasuki tahap selanjutnya
yaitu mengetik kode **java**.

Kelas **java** yang digunakan disini merupakan _extends_ dari kelas **AppCompatActivity**
(kemungkinan update menjadi _deprecated_ bisa disesuaikan dengan kode terbaru).

_Drawer_ yang digunakan kali ini adalah sebuah **ListView**, sehingga properti pada
kode java nya pun akan disesuaikan dengan elemen tersebut. Pada kode java akan
digunakan sebuah _array_ _String_ sebagai tempat data _list_ disimpan, dan sebuah
**ArrayAdapter** untuk variabel konversinya.

Mulai, tambahkan 2 anggota baru sebagai variabel ke dalam _Activity_-nya:

```java
private ListView mDrawerList;
private ArrayAdapter<String> mAdapter;
```

Kemudian arahkan variabel **ListView**(mDrawerList) dengan elemen yang ada pada
_layout_ didalam _method_ **onCreate()**:

```java
mDrawerList = (ListView) findViewById(R.id.navList);
```

Daftar menu akan dipisah menjadi sebuah _helper method_ tersendiri sehingga kode lebih
rapi dan dipanggil didalam ```onCreate()```:

```java
private void addDrawerItems(){
    String[] osArray = {"Ayam Goreng", "Sate", "Rendang", "Bakso", "Gorengan"};
    mAdapter.set(new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, osArray));
    mDrawerList.setAdapter(mAdapter.get());
}
```

Sampai disini, _drawer_ sudah bisa di-_draw_ ... dan selanjutnya

## _Toggle_ tampilan menu (tombol hamburger &#8801; / &#8592; tombol kembali)

Tahap ini lebih kepada pendekatan desain, jadi menu akan tampil sesuai dengan
petunjuk simbol ini - &#8801; (menu belum tampil) , &#8592; (menu tampil).

tambahkan kode berikut pada _method_ ```onCreate()```:

```java
if(getSupportActionBar() != null){
    getSupportActionBar().setDisplayHomeAsUpEnabled(true);
    getSupportActionBar().setHomeButtonEnabled(true);
}
```

Supaya tampilan bekerja seperti seharusnya dibutuhkan sesuatu yang disebut dengan
**ActionBarDrawerToggle**. Dimulai dengan beberapa tambahan variabel untuk membantu
objek ini bekerja, sebuah variabel untuk _toggle_, sebuah untuk **DrawerLayout**
representasi, dan sebuah _String_ untuk pembaharuan judul pada daerah **ActionBar**:

```java
private ActionBarDrawerToggle mDrawerToggle;
private DrawerLayout mDrawerLayout;
private String mActivityTitle;
```

Masukan kedalam _method_ ```onCreate()```:

```java
mDrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);
mActivityTitle = getTitle().toString();
```

Buat sebuah _helper method_ kembali khusus untuk pembentukan _drawer_, _method_
ini kurang lebih bercerita tentang men-_toggle_-kan **ActionBar**, ketika _drawer_
dibuka judul **ActionBar** = "Menunya", ketika _drawer_ tertutup **ActionBar** =
(judul sesuai dengan nilai dari _mActivityTitle_). Jangan lupa panggil
```setupDrawer()``` didalam ```onCreate()```

```java
private void setupDrawer() {
    mDrawerToggle = new ActionBarDrawerToggle(
            this
            , mDrawerLayout
            , R.string.drawer_open
            , R.string.drawer_close
    ){
        public void onDrawerOpened(View drawerView){
            super.onDrawerOpened(drawerView);
            if(getSupportActionBar() != null){
                getSupportActionBar().setTitle("Menunya");
            }
            invalidateOptionsMenu();
        }

        public void onDrawerClosed(View view){
            super.onDrawerClosed(view);
            if(getSupportActionBar() != null){
                getSupportActionBar().setTitle(mActivityTitle);
            }
            invalidateOptionsMenu();
        }
    };
}
```

Sayangnya, _toggle_ yang telah dibuat masih belum bekerja dengan baik, dibutuhkan
2 baris kode lagi untuk memungkinkan simbol &#8801; berfungsi yang kemudian
memasang objek _toggle_ baru pada _layout drawer_. Tambahkan kode berikut kedalam
```onCreate()```:

```java
mDrawerToggle.setDrawerIndicatorEnabled(true);
mDrawerLayout.setDrawerListener(mDrawerToggle);
```

Akhirnya, aktifkan hal berikut pada _method_ ```onOptionsItemSelected()```.

```java
public boolean onOptionsItemSelected(MenuItem item) {
    int id = item.getItemId();

    return
            id == R.id.action_settings
                    || mDrawerToggle.onOptionsItemSelected(item)
                    || super.onOptionsItemSelected(item);
}
```

## Indahnya Sinkronisasi

Dapat diperhatikan bahwa kode sementara belum bekerja secara sempurna antara
_drawer_ dengan pergantian simbol dan ketika terjadi pergantian _state_ didalam
**Activity** (_orientation changes_). Untuk melengkapi tambahkan kode berikut ...

```java
@Override
protected void onPostCreate(Bundle savedInstanceState) {
    super.onPostCreate(savedInstanceState);
    mDrawerToggle.syncState();
}

@Override
public void onConfigurationChanged(Configuration newConfig) {
    super.onConfigurationChanged(newConfig);
    mDrawerToggle.onConfigurationChanged(newConfig);
}
```

Kode lengkap untuk **Activity**-nya:

<div class="highlight-wrapper" style="max-height: 250px;overflow: auto;">
<div class="highlight"><pre><code class="language-java" data-lang="java"><span class="kn">package</span> <span class="n">com</span><span class="o">.</span><span class="na">example</span><span class="o">.</span><span class="na">dwi</span><span class="o">.</span><span class="na">nd</span><span class="o">;</span>

<span class="kn">import</span> <span class="nn">android.content.res.Configuration</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.os.Bundle</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.support.v4.widget.DrawerLayout</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.support.v7.app.ActionBarDrawerToggle</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.support.v7.app.AppCompatActivity</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.view.View</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.view.Menu</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.view.MenuItem</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.widget.AdapterView</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.widget.ArrayAdapter</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.widget.ListView</span><span class="o">;</span>
<span class="kn">import</span> <span class="nn">android.widget.Toast</span><span class="o">;</span>

<span class="kd">public</span> <span class="kd">class</span> <span class="nc">MainActivity</span> <span class="kd">extends</span> <span class="n">AppCompatActivity</span> <span class="o">{</span>

    <span class="kd">private</span> <span class="n">ListView</span> <span class="n">mDrawerList</span><span class="o">;</span>
    <span class="kd">private</span> <span class="kd">final</span> <span class="n">ThreadLocal</span><span class="o">&lt;</span><span class="n">ArrayAdapter</span><span class="o">&lt;</span><span class="n">String</span><span class="o">&gt;&gt;</span> <span class="n">mAdapter</span> <span class="o">=</span> <span class="k">new</span> <span class="n">ThreadLocal</span><span class="o">&lt;&gt;();</span>

    <span class="kd">private</span> <span class="n">ActionBarDrawerToggle</span> <span class="n">mDrawerToggle</span><span class="o">;</span>
    <span class="kd">private</span> <span class="n">DrawerLayout</span> <span class="n">mDrawerLayout</span><span class="o">;</span>
    <span class="kd">private</span> <span class="n">String</span> <span class="n">mActivityTitle</span><span class="o">;</span>

    <span class="nd">@Override</span>
    <span class="kd">protected</span> <span class="kt">void</span> <span class="nf">onCreate</span><span class="o">(</span><span class="n">Bundle</span> <span class="n">savedInstanceState</span><span class="o">)</span> <span class="o">{</span>
        <span class="kd">super</span><span class="o">.</span><span class="na">onCreate</span><span class="o">(</span><span class="n">savedInstanceState</span><span class="o">);</span>
        <span class="n">setContentView</span><span class="o">(</span><span class="n">R</span><span class="o">.</span><span class="na">layout</span><span class="o">.</span><span class="na">drawer_layout</span><span class="o">);</span>

        <span class="n">mDrawerList</span> <span class="o">=</span> <span class="o">(</span><span class="n">ListView</span><span class="o">)</span> <span class="n">findViewById</span><span class="o">(</span><span class="n">R</span><span class="o">.</span><span class="na">id</span><span class="o">.</span><span class="na">navList</span><span class="o">);</span>
        <span class="n">addDrawerItems</span><span class="o">();</span>

        <span class="n">mDrawerList</span><span class="o">.</span><span class="na">setOnItemClickListener</span><span class="o">(</span><span class="k">new</span> <span class="n">AdapterView</span><span class="o">.</span><span class="na">OnItemClickListener</span><span class="o">()</span> <span class="o">{</span>
            <span class="nd">@Override</span>
            <span class="kd">public</span> <span class="kt">void</span> <span class="nf">onItemClick</span><span class="o">(</span><span class="n">AdapterView</span><span class="o">&lt;?&gt;</span> <span class="n">parent</span><span class="o">,</span> <span class="n">View</span> <span class="n">view</span><span class="o">,</span> <span class="kt">int</span> <span class="n">position</span><span class="o">,</span> <span class="kt">long</span> <span class="n">id</span><span class="o">)</span> <span class="o">{</span>
                <span class="n">Toast</span><span class="o">.</span><span class="na">makeText</span><span class="o">(</span>
                        <span class="n">MainActivity</span><span class="o">.</span><span class="na">this</span>
                        <span class="o">,</span> <span class="s">"Menu nomor-"</span> <span class="o">+</span> <span class="n">position</span> <span class="o">+</span> <span class="s">" dipilih!"</span>
                        <span class="o">,</span> <span class="n">Toast</span><span class="o">.</span><span class="na">LENGTH_SHORT</span>
                <span class="o">).</span><span class="na">show</span><span class="o">();</span>
            <span class="o">}</span>
        <span class="o">});</span>

        <span class="k">if</span><span class="o">(</span><span class="n">getSupportActionBar</span><span class="o">()</span> <span class="o">!=</span> <span class="kc">null</span><span class="o">){</span>
            <span class="n">getSupportActionBar</span><span class="o">().</span><span class="na">setDisplayHomeAsUpEnabled</span><span class="o">(</span><span class="kc">true</span><span class="o">);</span>
            <span class="n">getSupportActionBar</span><span class="o">().</span><span class="na">setHomeButtonEnabled</span><span class="o">(</span><span class="kc">true</span><span class="o">);</span>
        <span class="o">}</span>

        <span class="n">mDrawerLayout</span> <span class="o">=</span> <span class="o">(</span><span class="n">DrawerLayout</span><span class="o">)</span> <span class="n">findViewById</span><span class="o">(</span><span class="n">R</span><span class="o">.</span><span class="na">id</span><span class="o">.</span><span class="na">drawer_layout</span><span class="o">);</span>
        <span class="n">mActivityTitle</span> <span class="o">=</span> <span class="n">getTitle</span><span class="o">().</span><span class="na">toString</span><span class="o">();</span>

        <span class="n">setupDrawer</span><span class="o">();</span>

        <span class="n">mDrawerToggle</span><span class="o">.</span><span class="na">setDrawerIndicatorEnabled</span><span class="o">(</span><span class="kc">true</span><span class="o">);</span>
        <span class="n">mDrawerLayout</span><span class="o">.</span><span class="na">setDrawerListener</span><span class="o">(</span><span class="n">mDrawerToggle</span><span class="o">);</span>
    <span class="o">}</span>

    <span class="kd">private</span> <span class="kt">void</span> <span class="nf">setupDrawer</span><span class="o">()</span> <span class="o">{</span>
        <span class="n">mDrawerToggle</span> <span class="o">=</span> <span class="k">new</span> <span class="nf">ActionBarDrawerToggle</span><span class="o">(</span>
                <span class="k">this</span>
                <span class="o">,</span> <span class="n">mDrawerLayout</span>
                <span class="o">,</span> <span class="n">R</span><span class="o">.</span><span class="na">string</span><span class="o">.</span><span class="na">drawer_open</span>
                <span class="o">,</span> <span class="n">R</span><span class="o">.</span><span class="na">string</span><span class="o">.</span><span class="na">drawer_close</span>
        <span class="o">){</span>
            <span class="kd">public</span> <span class="kt">void</span> <span class="nf">onDrawerOpened</span><span class="o">(</span><span class="n">View</span> <span class="n">drawerView</span><span class="o">){</span>
                <span class="kd">super</span><span class="o">.</span><span class="na">onDrawerOpened</span><span class="o">(</span><span class="n">drawerView</span><span class="o">);</span>
                <span class="k">if</span><span class="o">(</span><span class="n">getSupportActionBar</span><span class="o">()</span> <span class="o">!=</span> <span class="kc">null</span><span class="o">){</span>
                    <span class="n">getSupportActionBar</span><span class="o">().</span><span class="na">setTitle</span><span class="o">(</span><span class="s">"Menunya"</span><span class="o">);</span>
                <span class="o">}</span>
                <span class="n">invalidateOptionsMenu</span><span class="o">();</span>
            <span class="o">}</span>

            <span class="kd">public</span> <span class="kt">void</span> <span class="nf">onDrawerClosed</span><span class="o">(</span><span class="n">View</span> <span class="n">view</span><span class="o">){</span>
                <span class="kd">super</span><span class="o">.</span><span class="na">onDrawerClosed</span><span class="o">(</span><span class="n">view</span><span class="o">);</span>
                <span class="k">if</span><span class="o">(</span><span class="n">getSupportActionBar</span><span class="o">()</span> <span class="o">!=</span> <span class="kc">null</span><span class="o">){</span>
                    <span class="n">getSupportActionBar</span><span class="o">().</span><span class="na">setTitle</span><span class="o">(</span><span class="n">mActivityTitle</span><span class="o">);</span>
                <span class="o">}</span>
                <span class="n">invalidateOptionsMenu</span><span class="o">();</span>
            <span class="o">}</span>
        <span class="o">};</span>
    <span class="o">}</span>

    <span class="kd">private</span> <span class="kt">void</span> <span class="nf">addDrawerItems</span><span class="o">(){</span>
        <span class="n">String</span><span class="o">[]</span> <span class="n">osArray</span> <span class="o">=</span> <span class="o">{</span><span class="s">"Ayam Goreng"</span><span class="o">,</span> <span class="s">"Sate"</span><span class="o">,</span> <span class="s">"Rendang"</span><span class="o">,</span> <span class="s">"Bakso"</span><span class="o">,</span> <span class="s">"Gorengan"</span><span class="o">};</span>
        <span class="n">mAdapter</span><span class="o">.</span><span class="na">set</span><span class="o">(</span><span class="k">new</span> <span class="n">ArrayAdapter</span><span class="o">&lt;&gt;(</span><span class="k">this</span><span class="o">,</span> <span class="n">android</span><span class="o">.</span><span class="na">R</span><span class="o">.</span><span class="na">layout</span><span class="o">.</span><span class="na">simple_list_item_1</span><span class="o">,</span> <span class="n">osArray</span><span class="o">));</span>
        <span class="n">mDrawerList</span><span class="o">.</span><span class="na">setAdapter</span><span class="o">(</span><span class="n">mAdapter</span><span class="o">.</span><span class="na">get</span><span class="o">());</span>
    <span class="o">}</span>

    <span class="nd">@Override</span>
    <span class="kd">public</span> <span class="kt">boolean</span> <span class="nf">onCreateOptionsMenu</span><span class="o">(</span><span class="n">Menu</span> <span class="n">menu</span><span class="o">)</span> <span class="o">{</span>
        <span class="n">getMenuInflater</span><span class="o">().</span><span class="na">inflate</span><span class="o">(</span><span class="n">R</span><span class="o">.</span><span class="na">menu</span><span class="o">.</span><span class="na">menu_main</span><span class="o">,</span> <span class="n">menu</span><span class="o">);</span>
        <span class="k">return</span> <span class="kc">true</span><span class="o">;</span>
    <span class="o">}</span>

    <span class="nd">@Override</span>
    <span class="kd">public</span> <span class="kt">boolean</span> <span class="nf">onOptionsItemSelected</span><span class="o">(</span><span class="n">MenuItem</span> <span class="n">item</span><span class="o">)</span> <span class="o">{</span>
        <span class="kt">int</span> <span class="n">id</span> <span class="o">=</span> <span class="n">item</span><span class="o">.</span><span class="na">getItemId</span><span class="o">();</span>

        <span class="k">return</span>
                <span class="n">id</span> <span class="o">==</span> <span class="n">R</span><span class="o">.</span><span class="na">id</span><span class="o">.</span><span class="na">action_settings</span>
                        <span class="o">||</span> <span class="n">mDrawerToggle</span><span class="o">.</span><span class="na">onOptionsItemSelected</span><span class="o">(</span><span class="n">item</span><span class="o">)</span>
                        <span class="o">||</span> <span class="kd">super</span><span class="o">.</span><span class="na">onOptionsItemSelected</span><span class="o">(</span><span class="n">item</span><span class="o">);</span>
    <span class="o">}</span>

    <span class="nd">@Override</span>
    <span class="kd">protected</span> <span class="kt">void</span> <span class="nf">onPostCreate</span><span class="o">(</span><span class="n">Bundle</span> <span class="n">savedInstanceState</span><span class="o">)</span> <span class="o">{</span>
        <span class="kd">super</span><span class="o">.</span><span class="na">onPostCreate</span><span class="o">(</span><span class="n">savedInstanceState</span><span class="o">);</span>
        <span class="n">mDrawerToggle</span><span class="o">.</span><span class="na">syncState</span><span class="o">();</span>
    <span class="o">}</span>

    <span class="nd">@Override</span>
    <span class="kd">public</span> <span class="kt">void</span> <span class="nf">onConfigurationChanged</span><span class="o">(</span><span class="n">Configuration</span> <span class="n">newConfig</span><span class="o">)</span> <span class="o">{</span>
        <span class="kd">super</span><span class="o">.</span><span class="na">onConfigurationChanged</span><span class="o">(</span><span class="n">newConfig</span><span class="o">);</span>
        <span class="n">mDrawerToggle</span><span class="o">.</span><span class="na">onConfigurationChanged</span><span class="o">(</span><span class="n">newConfig</span><span class="o">);</span>
    <span class="o">}</span>
<span class="o">}</span>
</code></pre></div>
</div>

<hr>

>   Android NavigationDrawer
