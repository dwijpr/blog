Bermain TicTacToe
=================

<style>
    td.area-block:hover{
        background: rgba(0, 0, 0, .2);
    }
    .continue-game{
        font-size: initial;
    }
</style>

<div style="text-align: center;margin-top: 64px;">
    <h2 id="game-state">
        <span class="text"></span>
        <button 
            class="continue-game" 
            style="display: none;">OK</button>
    </h2>
    <div style="display: inline-block;">
        <table 
            class="area" 
            width="210px" 
            height="210px" 
            cellpadding="0" 
            cellspacing="0"
            style="font-size: 32px;table-layout: fixed;" 
        >
            <tr>
                <td 
                    class="area-block" 
                    width="(100/3)%"
                    height="(100/3)%"
                    style="border: 1px solid black;border-top-color: transparent;border-left-color: transparent;" 
                    data-map="0-0"
                ></td>
                <td 
                    class="area-block" 
                    width="(100/3)%"
                    height="(100/3)%"
                    style="border: 1px solid black;border-top-color: transparent;" 
                    data-map="0-1"
                ></td>
                <td 
                    class="area-block" 
                    width="(100/3)%"
                    height="(100/3)%"
                    style="border: 1px solid black;border-top-color: transparent;border-right-color: transparent;" 
                    data-map="0-2"
                ></td>
            </tr>
            <tr>
                <td
                    class="area-block" 
                    style="border: 1px solid black;border-left-color: transparent;" 
                    data-map="1-0"
                ></td>
                <td
                    class="area-block" 
                    style="border: 1px solid black;" 
                    data-map="1-1"
                ></td>
                <td
                    class="area-block" 
                    style="border: 1px solid black;border-right-color: transparent;" 
                    data-map="1-2"
                ></td>
            </tr>
            <tr>
                <td
                    class="area-block" 
                    style="border: 1px solid black;border-bottom-color: transparent;border-left-color: transparent;" 
                    data-map="2-0"
                ></td>
                <td
                    class="area-block" 
                    style="border: 1px solid black;border-bottom-color: transparent;" 
                    data-map="2-1"
                ></td>
                <td
                    class="area-block" 
                    style="border: 1px solid black;border-bottom-color: transparent;border-right-color: transparent;" 
                    data-map="2-2"
                ></td>
            </tr>
        </table>
        <br>
        <table style="text-align: center;" width="210px;">
            <tr>
                <th>Player(<i class="fa fa-close"></i>)</th>
                <th>Ties</th>
                <th>Player(<i class="fa fa-circle-o"></i>)</th>
            </tr>
            <tr>
                <td class="game-score player-x">0</td>
                <td class="game-score ties">0</td>
                <td class="game-score player-o">0</td>
            </tr>
        </table>
    </div>
</div>


<script>
var turn = true;
var gameTurn = turn;
var state = 0;
function setGameMessage(text, showButton){
    $("#game-state .text").html(text);
    console.log("showButton:", showButton);
    if(showButton){
        $("#game-state .continue-game").css(
            'display', 'inline-block'
        );
    }else{
        $("#game-state .continue-game").css(
            'display', 'none'
        );
    }
}
var iconClassName = "fa-question";
if(turn){
    iconClassName = "fa-close";
}else{
    iconClassName = "fa-circle-o";
}
setGameMessage("Player("+"<i class='fa "+iconClassName+"'></i>) Turn");

$("table.area td.area-block").each(function(){
    $(this).css('vertical-align', 'middle');
    $(this).css('text-align', 'center');
    $(this).css('margin', '0');
    $(this).css('padding', '0');
    $(this).html("&nbsp;");
    $(this).html("<i class='fa fa-question' style='visibility: hidden;'></i>");
    $(this).click(function(){
        action(this);
    });
});
function action(block){
    if(
        $(block).find("i").hasClass("fa-question")
        && state == 0
    ){
        var el = $(block).find("i");
        el.removeClass("fa-question");
        var iconClassName = "fa-question";
        if(turn){
            iconClassName = "fa-circle-o";
            el.addClass("fa-close");
        }else{
            iconClassName = "fa-close";
            el.addClass("fa-circle-o");
        }
        el.css("visibility", "visible");
        var win = checkWin();
        turn = !turn;
        if(!win){
            setGameMessage("Player("+"<i class='fa "+iconClassName+"'></i>) Turn");
        }else{
            state = 1;
        }
    }
}
function checkWin(){
    var map = [];
    var nodes = [];
    $("table.area td.area-block").each(function(){
        var rowCol = $(this).data('map');
        var row = rowCol.split("-")[0];
        var col = rowCol.split("-")[1];
        var value = $(this).find("i").hasClass("fa-close")?
            "x":($(this).find("i").hasClass("fa-circle-o")?"o":"-");
        if(map[row] == undefined){
            map[row] = [];
        }
        map[row][col] = value;
    });
    var classToFind = "fa-question";
    if(turn){
        classToFind = "fa-close";
    }else{
        classToFind = "fa-circle-o";
    }
    $("table.area td.area-block").each(function(){
        var rowCol = $(this).data('map');
        if($(this).find("i").hasClass(classToFind)){
            nodes.push(rowCol);
        }
    });
    var winNodes = [
        ["0-0", "0-1", "0-2"],
        ["1-0", "1-1", "1-2"],
        ["2-0", "2-1", "2-2"],
        ["0-0", "1-0", "2-0"],
        ["0-1", "1-1", "2-1"],
        ["0-2", "1-2", "2-2"],
        ["0-0", "1-1", "2-2"],
        ["0-2", "1-1", "2-0"],
    ];
    var win = false;
    var winNode = [];
    for(var i = 0;i < winNodes.length;i++){
        var winCount = 0;
        for(var _i = 0;_i < winNodes[i].length;_i++){
            for(var __i = 0;__i < nodes.length;__i++){
                if(winNodes[i][_i] == nodes[__i]){
                    winCount++;
                }
                if(winCount > 2){
                    win = true;
                    winNode = winNodes[i];
                    break;
                }
            }
        }
    }
    if(win){
        setGameMessage(
            "Player (<i class='fa "+classToFind+"'></i>) Win! "
            , true
        );
        var score = ".player-o";
        if(turn){
            score = ".player-x";
        }
        $(".game-score"+score).html(
            parseInt($(".game-score"+score).html())+1
        );
    }else{
        var unfilledCount = 0;
        $("table.area td.area-block").each(function(){
            if($(this).find("i").hasClass("fa-question")){
                unfilledCount++;
            }
        });
        if(unfilledCount == 0){
            setGameMessage(
                "No Winner!"
                , true
            );
            state = 1;
            win = true;
            var score = ".ties";
            $(".game-score"+score).html(
                parseInt($(".game-score"+score).html())+1
            )
        }
    }
    return win;
}
$(".continue-game").click(function(){
    state = 0;
    gameTurn = !gameTurn;
    $("table.area td.area-block").each(function(){
        $(this).find("i").removeClass("fa-circle-o");
        $(this).find("i").removeClass("fa-close");
        $(this).find("i").addClass("fa-question");
        $(this).find("i").css("visibility", "hidden");
        var iconClassName = "fa-question";
        if(gameTurn){
            iconClassName = "fa-close";
        }else{
            iconClassName = "fa-circle-o";
        }
        setGameMessage(
            "Player("+"<i class='fa "+iconClassName+"'></i>) Turn"
        );
    });
});
</script>
