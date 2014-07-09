// Create a jquery plugin that prints the given element.
jQuery.fn.print = function() {
    // NOTE: We are trimming the jQuery collection down to the
    // first element in the collection.
    if (this.size() > 1) {
        this.eq(0).print();
        return;
    } else if (!this.size()) {
        return;
    }

    // ASSERT: At this point, we know that the current jQuery
    // collection (as defined by THIS), contains only one
    // printable element.

    // Create a random name for the print frame.
    var strFrameName = ("printer-" + (new Date()).getTime());

    // Create an iFrame with the new name.
    var jFrame = $("<iframe name='" + strFrameName + "' id='testf' src = 'http://192.168.5.19/inventory/assets_inv/estimations/EST000044_2014_06_25.pdf' >");

    // Hide the frame (sort of) and attach to the body.
    jFrame
    .css("width", "1px")
    .css("height", "1px")
    .css("position", "absolute")
    .css("left", "-9999px")
    .appendTo($("body:first"))
    ;

    
    alert(jFrame);  
    // Get a FRAMES reference to the new frame.
   var objFrame = window.frames[strFrameName];

    // Get a reference to the DOM in the new frame.
   // var objDoc = objFrame.document;

    // Grab all the style tags and copy to the new
    // document so that we capture look and feel of
    // the current document.

    // Create a temp document DIV to hold the style tags.
    // This is the only way I could find to get the style
    // tags into IE.
    var jStyleDiv = $("<div>").append(
    $("style").clone()
    );

    // Write the HTML for the document. In this, we will
    // write out the HTML of the current element.
   /* alert(document.title);
    objDoc.open();
    objDoc.write("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">");
    objDoc.write("<html>");
    objDoc.write("<body>");
    objDoc.write("<head>");
    objDoc.write("<title>");
    objDoc.write(document.title);
    objDoc.write("</title>");
    objDoc.write(jStyleDiv.html());
    objDoc.write("</head>");
   // objDoc.write(this.html());
    objDoc.write("</body>");
    objDoc.write("</html>");
    objDoc.close();*/

    // Print the document.

  /*  function inIframe(){
    if(top != self){
         var contentHeight = $('#myIframeContent').height(); //Just this part I did with jQuery as I was sure that the document uses it
         postSize(contentHeight);
         }
    }
    function postSize(height){
     var target = parent.postMessage ? parent : (parent.document.postMessage ? parent.document : undefined);

    if(typeof target != "undefined" && document.body.scrollHeight){
        target.postMessage(height, "*");
        }
    }

    function receiveSize(e){
    if(e.origin === "*"){
        var newHeight = e.data + 35;
        document.getElementById("testf").style.height = newHeight + "px";
        }
    }

window.addEventListener("message", receiveSize, false);*/
    objFrame.focus();


    var iframe = document.frames ? window.frames.frames[strFrameName] :document.getElementById("testf");
var ifWin = iframe.contentWindow || iframe;
try {
iframe.focus();
iframe.print();
}
catch(e) {
window.print(false);
//or when you get Invalid calling object error for IE9 and above
//set the browser into IE8 compatibility mode will work
}



 /*    if (window.frames[strFrameName] == null){
    alert('document not found');
   } else {
    window.frames[strFrameName].focus();
window.frames[strFrameName]. print();
   }
 */
    

    // Have the frame remove itself in about a minute so that
    // we don't build up too many of these frames.
    setTimeout(
    function() {
        jFrame.remove();
    },
    (60 * 1000)
    );
}