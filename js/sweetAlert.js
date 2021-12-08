
    const username = document.getElementById('username').value;
    const pass = document.getElementById('pass');

    console.log(username, pass);
    if(username.length == ""){
        Swal.fire({
            icon:'warning',
            title: 'Debe ingresar correo o nombre de usuario'
        });
    }else if(pass == ""){
        Swal.fire({
            icon:'warning',
            title: 'Debe ingresar el password'
        });
    }
