/*
    debug.js

    create new instance:
        var d = new Debug();

    functions:

        // printing
        d.p(params) === console.log(params)
        
        // runtime disable
        d.disable()
*/
function Debug(disable){
    this.p = !disable?console.log.bind(window.console):function(){};
    this.disable = function(){
        this.p = function(){};
    }
}
