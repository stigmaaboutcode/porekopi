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


const toggle = document.querySelector(".toggle"),
    input = document.querySelector(".pass");

    toggle.addEventListener("click", () => {
        if(input.type === 'password'){
            input.type = "text",
            toggle.classList.replace("ri-eye-off-line", "ri-eye-line")
        }else{
            input.type = "password",
            toggle.classList.replace("ri-eye-line", "ri-eye-off-line")
        }
    });

    