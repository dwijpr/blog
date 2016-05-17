Breakout Game
=============

<style>
    #breakout-game * { padding: 0; margin: 0; }
    canvas#myCanvas { background: #ddd; display: block; margin: 0 auto; }
</style>

<div id="breakout-game">
    <canvas id="myCanvas" width="480" height="320"></canvas>
    <script src="{{ asset('js/breakout/debug.js') }}"></script>
    <script src="{{ asset('js/breakout/vars.js') }}"></script>
    <script src="{{ asset('js/breakout/breakout.js') }}"></script>
    <script>
        var game = new Game("myCanvas");
        game.run();
    </script>
</div>
