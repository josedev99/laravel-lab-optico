document.addEventListener('DOMContentLoaded', () => {
    try {
        let btnUserForm = document.getElementById('btn-form-usuario')
        if (btnUserForm) {
            btnUserForm.addEventListener('click', (e) => {
                $("#modal-form-user").modal('show');
                e.stopPropagation();
            })
        }
        //Procesar formulario de usuario
        let formUser = document.getElementById('form-user');
        if (formUser) {
            formUser.addEventListener('submit', (e) => {
                e.preventDefault();
                let formData = new FormData(formUser);
                axios.post(route('user.save'), formData)
                    .then((res) => {
                        console.log(res)
                    })
                    .catch(err => console.log(err))
            })
        }
    } catch (err) {
        console.log(err)
    }
})