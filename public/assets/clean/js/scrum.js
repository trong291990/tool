function initHiddenField(name,value) {
    if (typeof value === "undefined") {
        value = '';
    }
    return '<input class="hidden" type="hidden" name="'+name+'" value="'+value+'" />';
}
jQuery.fn.extend({
    addHiddenField : function(name,value){
        $(this).append(initHiddenField(name,value));
    }
});