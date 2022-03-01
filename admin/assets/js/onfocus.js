moveCursorToEnd = function(el, focused) {
    if (typeof el.selectionStart == "number") {
        el.selectionStart = el.selectionEnd = el.value.length;
    } else if (typeof el.createTextRange != "undefined") {
        if(!focused)
            el.focus();
        var range = el.createTextRange();
        range.collapse(false);
        range.select();
    }
    if(!focused)
        el.focus();
}
    
onbodyload = function() {
    elem = document.getElementById('totheend');
    moveCursorToEnd(elem);
}