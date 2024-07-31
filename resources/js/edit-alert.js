
const formEls = document.querySelectorAll('form.form-selector');

formEls.forEach((formEl)=>{
    formEl.addEventListener("submit", function(event){
        event.preventDefault();
        const userChoise = window.confirm('Do you want to edit it?');
        if (userChoise) {
            this.submit();
        }
    })

});
