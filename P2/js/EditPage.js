

$(function() {
    $("textarea.editBox").draggable();
});

var lastSelectedBox;

var cursorX;
var cursorY;
var movingBox;
var carrying = false;

document.addEventListener('mousemove', mouseMoved, false);

function mouseMoved(e) {
    if(carrying && movingBox !== null) {
        cursorX = e.pageX - $('#editorArea').offset().left;
        cursorY = e.pageY - $('#editorArea').offset().top;
        $(movingBox).css("left", cursorX+"px");
        $(movingBox).css("top", cursorY+"px");
    }
}

var numBoxes = 0;
var dragging = false;

//$(function() {
    //var editArea = document.getElementById("editArea");
    $("#template").click(function(e) {
        carrying = false;
        /*if(!dragging) {*/
            if(document.activeElement === document.body) {
                $(lastSelectedBox).draggable("enable");
                $(lastSelectedBox).css("cursor", "move");
                //placeBox(e);
                /*dragging = true;*/
               /* numBoxes++;
                var x = e.pageX - $('#editorArea').offset().left;
                var y = e.pageY - $('#editorArea').offset().top;
                var box = $("<textarea class='editBox' id='text"+numBoxes+"'/>").css({
                    "position": "absolute",                    
                    "left": x,
                    "top": y
                });
                $("#editorArea").append(box);
                $(box).draggable({
                    containment: "#template",
                    cancel: ''
                });
                $(box).click(function(e) {
                    setSelected(box);
                });
                setSelected(box);*/
                /*function resize() {
                    var newWidth = (e.cursorX - x)+"px";
                    //div.style.width=newWidth;
                    div.width=newWidth;
                    box.width=newWidth;
                    
                    if(dragging) {
                        setTimeout(resize, 100);
                    }
                    else {*/
                       // box.focus();
                    /*}
                }
                resize();*/
                
            }
        //}
        /*else {
            dragging = false;
        }*/
    });
//});

$("#editorArea").click(function(e) {
   carrying = false; 
});


$("#newbox").click(function(e) {
        placeBox(e);
    });
    
function placeBox(e) {
    if(!carrying) {
        carrying = true;
        numBoxes++;
        var x = e.pageX - $('#editorArea').offset().left;
        var y = e.pageY - $('#editorArea').offset().top;
        var box = $("<textarea class='editBox' id='text"+numBoxes+"'/>").css({
            "position": "absolute",                    
            "left": x,
            "top": y,
            //"font-family": getFont(),
            "font-size": getFontSize()+"px",
            "text-align": getAlignment(),
            "font-weight": getBold(),
            "font-style": getItalic(),
            "text-decoration": getUnderline()
        });
        $("#editorArea").append(box);

        movingBox = box;

        $(box).draggable({
            containment: "#template",
            cancel: ''
        });
        $(box).focus(function(e) {
            setSelected(box);
        });
        setSelected(box);
        /*function move() {
            var newX = cursorX;
            var newY = cursorY;
            $("#textdiv"+numBoxes).css("left", newX+"px");
            $("#textdiv"+numBoxes).css("top", newY+"px");
            if(carrying) {
                setTimeout(move(), 100);
            }
            else {
                box.focus();
            }
        }
        move();*/

    }
}
    
$("#deletebox").click(function(e) {
    $(lastSelectedBox).remove();
    lastSelectedBox = undefined;
    var elements = $(".editBox");
    if(elements.length > 0) {
        setSelected($(elements[elements.length-1]));
    }
});


function setSelected(box) {
    if(lastSelectedBox !== undefined) {
        $(lastSelectedBox).removeClass("glowingBox");
        $(lastSelectedBox).draggable("enable");
        $(lastSelectedBox).css("cursor", "move");
    }
    lastSelectedBox = box;
    $(box).addClass("glowingBox");
    $(box).draggable("disable");
    $(box).css("cursor", "text");
    
    setFont($(box).css("font-family"));
    setBold($(box).css("font-weight"));
    setItalic($(box).css("font-style"));
    setUnderline($(box).css("text-decoration"));
    setFontSize($(box).css("font-size"));
    setAlignment($(box).css("text-align"));
}

$("#showborders").click(function(e) {
   if(!$("#showborders").is(':checked')) {
       $("textarea.editBox").css("border-style", "dotted");
       $("textarea.editBox").css("resize", "both");
       $(lastSelectedBox).addClass("glowingBox");
   } 
   else {
       $("textarea.editBox").css("border-style", "none");
       $("textarea.editBox").css("resize", "none");
       $(lastSelectedBox).removeClass("glowingBox");
   }
});



$("#fontSelect").change(function() {
    //$(lastSelectedBox).css("font-family", $("#fontSelect").val()+", "+)
});

$("#bold").change(function() {
    if($("#bold").is(':checked')) {
        $(lastSelectedBox).css("font-weight", "bold");
    }
    else {
        $(lastSelectedBox).css("font-weight", "normal");
    }
});

$("#italic").change(function() {
   if($("#italic").is(':checked')) {
       $(lastSelectedBox).css("font-style", "italic");
   }
   else {
       $(lastSelectedBox).css("font-style", "normal");
   }
});

$("#underline").change(function() {
    if($("#underline").is(':checked')) {
        $(lastSelectedBox).css("text-decoration", "underline");
    }
    else {
        $(lastSelectedBox).css("text-decoration", "none");
    }
});

$("#fontsize").change(function() {
    $(lastSelectedBox).css("font-size", $("#fontsize").val()+"px");
});

$("#alignment").change(function() {
    $(lastSelectedBox).css("text-align", $("#alignment").val());
});

function getFont() {
    var value = $("#fontSelect").val();
    switch(value) {
        case "Arial Black": return "Arial Black, Gadget, sans-serif";
            break;
        case "Calibri": ;
            break;
        case "Times New Roman": return '"Times New Roman", Georgia, Serif';
            break;
    }
};

function getBold() {
    if($("#bold").is(':checked')) {
        return "bold";
    }
    return "normal";
}

function getItalic() {
    if($("#italic").is(':checked')) {
        return "italic";
    }
    return "normal";
}

function getUnderline() {
    if($("#underline").is(':checked')) {
        return "underline";
    }
    return "none";
}

function getFontSize() {
    return $("#fontsize").val();
}

function getAlignment() {
    return $("#alignment").val();
}

function setFont(font) {
    
}

function setBold(bold) {
    if(bold === "bold") {
        $("#bold").prop("checked", true);
    }
    else {
        $("#bold").prop("checked", false);
    }
}

function setItalic(italic) {
    if(italic === "italic") {
        $("#italic").prop("checked", true);
    }
    else {
        $("#italic").prop("checked", false);
    }
}

function setUnderline(underline) {
    if(underline === "underline") {
        $("#underline").prop("checked", true);
    }
    else {
        $("#underline").prop("checked", false);
    }
}

function setFontSize(size) {
    size = size.substring(0, size.indexOf("px"));
    $("#fontsize").val(size);
}

function setAlignment(alignment) {
    switch(alignment) {
        case "left": $("#alignment").val("Left");
            break;
        case "center": $("#alignment").val("Center");
            break;
        case "right": $("#alignment").val("Right");
            break;
    }
}