Permainan TicTacToe
===================

<style>
    .tictactoe-arena-wrapper{
        text-align: center;
    }
    .tictactoe-arena{
        display: inline-block;
        width: 128px;
        height: 128px;
        word-spacing: 0;
        text-align: left;
    }
    .tictactoe-arena .block{
        width: 42px;
        height: 42px;
        border: 1px solid black;
        float: left;
    }

    .tictactoe-arena .top .block{
        border-top-color: transparent;
        text-align: center;
    }
    .tictactoe-arena .left{
        border-left-color: transparent;
    }
    .tictactoe-arena .right{
        border-right-color: transparent;
    }
    .tictactoe-arena .bottom .block{
        border-bottom-color: transparent;
    }
    .tictactoe-arena .item{
        font-size: 32px;
    }
    .tictactoe-arena table{
        width: 100%;
        height: 100%;
        text-align: center;
        vertical-align: middle;
    }
</style>

**~** adalah permainan yang dilakukan oleh dua orang menggunakan
alat tulis (pensil dan kertas). Pada kertas, dibentuklah arena
dengan ukuran 3x3 kotak, kurang lebih seperti ini ...

<div class="tictactoe-arena-wrapper">
    <div class="tictactoe-arena">
        <div class="top">
            <div class="block left"></div>
            <div class="block center"></div>
            <div class="block right"></div>
        </div>
        <div class="center">
            <div class="block left"></div>
            <div class="block center"></div>
            <div class="block right"></div>
        </div>
        <div class="bottom">
            <div class="block left"></div>
            <div class="block center"></div>
            <div class="block right"></div>
        </div>
    </div>
</div>

_Game_ ini menggunakan 2 buah simbol seperti
<i class="fa fa-close"></i> dan <i class="fa fa-circle-o"></i>
yang digunakan oleh masing-masing pemain secara konsisten
(tidak berganti-ganti simbol)
, setiap kotak akan berisi sebuah simbol saja 
dan diisi dengan bergantian oleh setiap pemain.

<div class="tictactoe-arena-wrapper initial-play">
    <div class="tictactoe-arena">
        <div class="top">
            <div class="block left">
                <table class="step-7"><tr><td>
                    <i class="fa fa-circle-o item"></i>
                </td></tr></table>
            </div>
            <div class="block center">
                <table class="step-2"><tr><td>
                    <i class="fa fa-close item"></i>
                </td></tr></table>
            </div>
            <div class="block right">
                <table class="step-6"><tr><td>
                    <i class="fa fa-close item"></i>
                </td></tr></table>
            </div>
        </div>
        <div class="center">
            <div class="block left">
                <table class="step-4"><tr><td>
                    <i class="fa fa-close item"></i>
                </td></tr></table>
            </div>
            <div class="block center">
                <table class="step-1"><tr><td>
                    <i class="fa fa-circle-o item"></i>
                </td></tr></table>
            </div>
            <div class="block right">
                <table class="step-3"><tr><td>
                    <i class="fa fa-circle-o item"></i>
                </td></tr></table>
            </div>
        </div>
        <div class="bottom">
            <div class="block left">
                <table class="step-5"><tr><td>
                    <i class="fa fa-circle-o item"></i>
                </td></tr></table>
            </div>
            <div class="block center"></div>
            <div class="block right">
                <table class="step-8"><tr><td>
                    <i class="fa fa-close item"></i>
                </td></tr></table>
            </div>
        </div>
    </div>
</div>

<style>
    .initial-play table{
        display: none;
    }
</style>

<script>
    var initialPlayStep = 1;
    setInterval(function() {
        if(initialPlayStep > 8){
            $(".initial-play table").each(function(){
                $(this).css('display', 'none');
            });
            initialPlayStep = 0;
        }else{
            $(".initial-play table.step-"+initialPlayStep)
                .css('display', 'table');
        }
        initialPlayStep++;
    }, 500);
</script>

Cara memenangkan sebuah pertandingan _**tic tac toe**_ adalah
dengan menyusun simbol yang sama secara berurutan baik itu
horizontal, vertikal, maupun diagonal

<div style="overflow-x: auto;">
    <table style="width: 100%;">
        <tr>
            <td style="width: 33%;">
                <div class="tictactoe-arena-wrapper">
                    <div class="tictactoe-arena">
                        <div class="top">
                            <div class="block left"></div>
                            <div class="block center">
                            </div>
                            <div class="block right"></div>
                        </div>
                        <div class="center">
                            <div class="block left">
                                <table class="step-1"><tr><td>
                                    <i class="fa fa-close item"></i>
                                </td></tr></table>
                            </div>
                            <div class="block center">
                                <table class="step-2"><tr><td>
                                    <i class="fa fa-close item"></i>
                                </td></tr></table>
                            </div>
                            <div class="block right">
                                <table class="step-5"><tr><td>
                                    <i class="fa fa-close item"></i>
                                </td></tr></table>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="block left"></div>
                            <div class="block center">
                            </div>
                            <div class="block right"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td style="width: 33%;">
                <div class="tictactoe-arena-wrapper">
                    <div class="tictactoe-arena">
                        <div class="top">
                            <div class="block left"></div>
                            <div class="block center">
                                <table class="step-1"><tr><td>
                                    <i class="fa fa-circle-o item"></i>
                                </td></tr></table>
                            </div>
                            <div class="block right"></div>
                        </div>
                        <div class="center">
                            <div class="block left"></div>
                            <div class="block center">
                                <table class="step-2"><tr><td>
                                    <i class="fa fa-circle-o item"></i>
                                </td></tr></table>
                            </div>
                            <div class="block right"></div>
                        </div>
                        <div class="bottom">
                            <div class="block left"></div>
                            <div class="block center">
                                <table class="step-5"><tr><td>
                                    <i class="fa fa-circle-o item"></i>
                                </td></tr></table>
                            </div>
                            <div class="block right"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td style="width: 33%;">
                <div class="tictactoe-arena-wrapper">
                    <div class="tictactoe-arena">
                        <div class="top">
                            <div class="block left">
                                <table class="step-1"><tr><td>
                                    <i class="fa fa-close item"></i>
                                </td></tr></table>
                            </div>
                            <div class="block center">
                            </div>
                            <div class="block right"></div>
                        </div>
                        <div class="center">
                            <div class="block left">
                            </div>
                            <div class="block center">
                                <table class="step-2"><tr><td>
                                    <i class="fa fa-close item"></i>
                                </td></tr></table>
                            </div>
                            <div class="block right">
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="block left"></div>
                            <div class="block center">
                            </div>
                            <div class="block right">
                                <table class="step-5"><tr><td>
                                    <i class="fa fa-close item"></i>
                                </td></tr></table>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

Begitulah sedikit tentang permainan **_tic tac toe_** ini,
_game_ yang cukup simpel dan menyenangkan untuk dimainkan,
tertarik untuk mencoba bermain? coba 
<a href="{% post_url 2015-08-13-bermain-tictactoe %}">disini</a>.

<hr>

>   _Game_ _TicTacToe_
