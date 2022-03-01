$("#username").on({
    keydown: function(e) {
        if (e.which === 32)
            return false;
    },
    keyup: function(){
        this.value = this.value.toLowerCase();
    }, 
    change: function() {
        this.value = this.value.replace(/\s/g, "");
    }
});
