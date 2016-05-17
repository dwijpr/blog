function Game(canvasId){

    var v = new Vars(canvasId);
    var d = this.d = v.d;

    function draw(){
        v.context.clearRect(0, 0, v.canvas.width, v.canvas.height);
        drawLives();
        drawScore();
        drawBricks();
        drawBall();
        drawPaddle();
    }

    function update(){
        collisionDetection();
        updateBall();
    }

    function _run(){
        update();
        draw();
        requestAnimationFrame(_run);
    }

    this.run = function(){
        _run();
    }

    /*
        Drawing Functions
    */

    function drawText(text, x, y){
        v.context.font = v.font;
        v.context.fillStyle = v.color;
        v.context.fillText(text, x, y);
    }

    function drawRect(x, y, w, h){
        var ctx = v.context;
        ctx.beginPath();
        ctx.rect(x, y, w, h);
        ctx.fillStyle = v.color;
        ctx.fill();
        ctx.closePath();
    }

    function drawLives(){
        drawText("Lives: "+v.lives, v.canvas.width-65, 20);
    }

    function drawScore(){
        drawText("Score: "+v.score, 8, 20);
    }

    function drawBricks(){
        for(var c = 0; c < v.brickColumnCount; c++){
            for(var r = 0; r < v.brickRowCount; r++){
                if(v.bricks[c][r].status == 1){
                    var brickX = (c*(v.brickWidth+v.brickPadding))+v.brickOffsetLeft;
                    var brickY = (r*(v.brickHeight+v.brickPadding))+v.brickOffsetTop;

                    v.bricks[c][r].x = brickX;
                    v.bricks[c][r].y = brickY;

                    drawRect(brickX, brickY, v.brickWidth, v.brickHeight);
                }
            }
        }
    }

    function drawBall(){
        var ctx = v.context;
        ctx.beginPath();
        ctx.arc(v.x, v.y, v.ballRadius, 0, Math.PI*2);
        ctx.fillStyle = v.color;
        ctx.fill();
        ctx.closePath();
    }

    function drawPaddle(){
        drawRect(
            v.paddleX, v.canvas.height-v.paddleHeight
            , v.paddleWidth, v.paddleHeight
        );
    }

    /*
        Drawing Functions
    */

    // =====================================================

    /*
        Update Functions
    */

    function updateBall(){
        if(v.x + v.dx > v.canvas.width - v.ballRadius || v.x + v.dx < v.ballRadius){
            v.dx = -v.dx;
        }
        if(v.y + v.dy < v.ballRadius){
            v.dy = -v.dy;
        }else if(v.y + v.dy > v.canvas.height - v.ballRadius){
            if(v.x > v.paddleX && v.x < v.paddleX + v.paddleWidth){
                v.dy = -v.dy;
            }else{
                v.lives--;
                if(!v.lives){
                    alert("Game Over");
                    document.location.reload();
                }else{
                    v.x = v.canvas.width/2;
                    v.y = v.canvas.height-30;
                    v.dx = 2;
                    v.dy = -2;
                    v.paddleX = (v.canvas.width-v.paddleWidth)/2;
                }
            }
        }
        v.x += v.dx;
        v.y += v.dy;
        if(v.rightPressed && v.paddleX < v.canvas.width - v.paddleWidth){
            v.paddleX += 7;
        }else if(v.leftPressed && v.paddleX > 0){
            v.paddleX -= 7;
        }
    }

    function collisionDetection(){
        for(var c = 0;c < v.brickColumnCount; c++){
            for(var r = 0;r < v.brickRowCount; r++){
                var b = v.bricks[c][r];
                if(b.status == 1){
                    if(
                        v.x > b.x && v.x < b.x + v.brickWidth && v.y > b.y
                        && v.y < b.y + v.brickHeight
                    ){
                        v.dy = -v.dy;
                        b.status = 0;
                        v.score++;
                        if(v.score == v.brickRowCount*v.brickColumnCount){
                            alert("You Win! Congratulations!");
                            document.location.reload();
                        }
                    }
                }
            }
        }
    }

    /*
        Update Functions
    */

    // =========================================================================

    /*
        Action Handler
    */

    function keyDownHandler(e){
        if(e.keyCode == 39){
            v.rightPressed = true;
        }else if(e.keyCode == 37){
            v.leftPressed = true;
        }
    }

    function keyUpHandler(e){
        if(e.keyCode == 39){
            v.rightPressed = false;
        }else if(e.keyCode == 37){
            v.leftPressed = false;
        }
    }

    function mouseMoveHandler(e){
        var relativeX = e.clientX - v.canvas.offsetLeft;
        if(relativeX > 0 && relativeX < v.canvas.width){
            v.paddleX = relativeX - v.paddleWidth/2;
        }
    }

    document.addEventListener("keydown", keyDownHandler, false);
    document.addEventListener("keyup", keyUpHandler, false);

    document.addEventListener("mousemove", mouseMoveHandler, false);

    /*
        Action Handler
    */
}
