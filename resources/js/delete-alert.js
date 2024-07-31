const formEls = document.querySelectorAll("form.form-deleter");
formEls.forEach((formEl)=>{
    formEl.addEventListener("submit", function(event){
        event.preventDefault();
        const userChoise = window.confirm("Are you sure?");
        if (userChoise) {
            this.submit();
        }
    });
});
