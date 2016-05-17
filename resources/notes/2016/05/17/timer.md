Timer
=====

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

<style>
    #the-timer{
        border: 16px solid rgba(0, 0, 0, .1);
        display: inline-block;
        padding: 82px 16px;
        border-radius: 100%;
    }
    #button-group{
        position: relative;
        top: -32px;
    }
    #button-group .btn{
        box-shadow: 0px 4px 16px #777;
    }
</style>

<div class="row">
    <div class="col-xs-12 text-center">
        <h1 id="the-timer">
            00:00:00.0
        </h1>
        <div id="button-group" class="text-center">
            <button 
                class="btn btn-danger" 
                id="reset" 
            >
                <i class="fa fa-repeat"></i>
            </button>
            <button class="btn btn-lg btn-primary" id="action-trigger">
                <i class="fa fa-play"></i>
            </button>
        </div>
    </div>
</div>

<script>
    var startTime = null, startPauses = [], endPauses = [];
    $("#reset").click(function(){
        var proceed = confirm("Are You sure?");
        if(proceed){
            startTime = null, startPauses = [], endPauses = [];
            $("#the-timer").text("00:00:00.0");
            var ic = $("#action-trigger").find('i');
            if(ic.hasClass('fa-pause')){
                ic.removeClass('fa-pause');
                ic.addClass('fa-play');
            }
        }
    });
    $("#action-trigger").click(function(){
        var ic = $(this).find('i');
        if(ic.hasClass('fa-play')){
            ic.removeClass('fa-play');
            ic.addClass('fa-pause');
            if(startTime != null){
                endPauses[endPauses.length] = curr();
            }
        }else{
            ic.removeClass('fa-pause');
            ic.addClass('fa-play');
            startPauses[startPauses.length] = curr();
        }
        if(startTime == null){
            startTime = curr();
        }
    });

    function calculateTime(){
        var totalPausesTime = 0;
        for(var i = 0;i < startPauses.length;i++){
            totalPausesTime += endPauses[i].diff(startPauses[i]);
        }
        var valueStartTime = moment(startTime);
        var totalTime = valueStartTime.add(totalPausesTime, 'milliseconds');
        var elapsedTime = new Time(curr().diff(totalTime));
        return moment(elapsedTime).format("HH:mm:ss.S");
    }

    setInterval(function(){
        if(startTime != null && startPauses.length == endPauses.length){
            $("#the-timer").text(calculateTime());
        }
    }, 100);

    function curr(){
        return moment();
    }

    function Time(timeInMS){
        var ms = timeInMS;
        var seconds = Math.floor(ms/1000);
        var minutes = Math.floor(seconds/60);
        var hours = Math.floor(minutes/60);

        var ms = ms%1000;
        var second = seconds%60;
        var minute = minutes%60;

        var time = {
            hours: hours,
            minutes: minute,
            seconds: second,
            milliseconds: ms,
        };
        return time;
    }
</script>
