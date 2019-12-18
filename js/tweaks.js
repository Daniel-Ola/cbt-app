

            // window.history.pushState(null, null, "./user-login.php") ;hide view source

// disable shortcut keys
            document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    } 

    if(e.ctrlKey && e.keyCode == 'R'.charCodeAt(0)){
     return false;
    }   
}

    function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};

    var el = document.documentElement
        , rfs = // for newer Webkit and Firefox
               el.requestFullScreen
            || el.webkitRequestFullScreen
            || el.mozRequestFullScreen
            || el.msRequestFullscreen
    ;
    if(typeof rfs!="undefined" && rfs){
      rfs.call(el);
    } else if(typeof window.ActiveXObject!="undefined"){
      // for Internet Explorer
      var wscript = new ActiveXObject("WScript.Shell");
      if (wscript!=null) {
         wscript.SendKeys("{F11}");
      }
    }

    window.onkeydown = function(e){
        // alert(window.event.keyCode) ;
        if(window.event.keyCode == 116)
        {
            e.preventDefault() ;
        }
    }


                    /*function requestFullScreen(element) {
                        // Supports most browsers and their versions.
                        var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

                        if (requestMethod) { // Native full screen.
                            requestMethod.call(element);
                        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                            var wscript = new ActiveXObject("WScript.Shell");
                            if (wscript !== null) {
                                wscript.SendKeys("{F11}");
                            }
                        }
                    }
                    var elem = document.body; // Make the body go full screen.
                    requestFullScreen(elem);*/