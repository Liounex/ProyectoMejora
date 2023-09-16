

$(document).ready(async function () {
    const tokenAcceso = localStorage.getItem('access_token')
    if (!tokenAcceso) {
        window.location.href = './../auth/index.html';
    }

    if (tokenAcceso) {
        const response = await fetch('http://127.0.0.1:8000/usuario', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${tokenAcceso}`
            }
        })

        const data = await response.json()
        $("#name_user").text(data.nombre)
    }

})


$(document).on('click', '#btn-close', async function () {
    const tokenAcceso = localStorage.getItem('access_token')
    console.log(tokenAcceso)

    // Realizar la solicitud Fetch al endpoint de cierre de sesión
    const response = await fetch('http://127.0.0.1:8000/logout', {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${tokenAcceso}`,
        }
    });

    if (response.ok) {
        localStorage.removeItem('access_token');
        window.location.href = './../auth/index.html';
    } else {
        alert("Intente mas tarde")
    }


})

