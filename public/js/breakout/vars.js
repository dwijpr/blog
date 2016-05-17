function Vars(canvasId){
    this.canvas = document.getElementById(canvasId);
    this.context = this.canvas.getContext("2d");
    this.d = new Debug();

    this.color = "#009533";
    this.font = "16px Arial";

    this.lives = 3;
    this.score = 0;

    this.x = this.canvas.width/2;
    this.y = this.canvas.height-30;
    this.dx = 2;
    this.dy = -2;

    this.ballRadius = 10;

    this.paddleHeight = 10;
    this.paddleWidth = 75;
    this.paddleX = (this.canvas.width-this.paddleWidth)/2;

    this.rightPressed = false;
    this.leftPressed = false;

    this.brickRowCount = 3;
    this.brickColumnCount = 5;
    this.brickWidth = 75;
    this.brickHeight = 20;
    this.brickPadding = 10;
    this.brickOffsetTop = 30;
    this.brickOffsetLeft = 30;

    this.bricks = [];
    for(var c = 0; c < this.brickColumnCount; c++){
        this.bricks[c] = [];
        for(var r = 0; r < this.brickRowCount; r++){
            this.bricks[c][r] = {x: 0, y: 0, status: 1};
        }
    }
}