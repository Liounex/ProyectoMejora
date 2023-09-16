$("#btn-acceder").click(async function (e) {
    e.preventDefault()

    const correo = $("#correo").val().trim()
    const password = $("#password").val().trim()

    if (correo === "" || password === "") {
        alert("Por favor, completa todos los campos.")
        return
    }

    const request = {
        correo: correo,
        password: password
    }

    const resultado = await authUser(request)

    if (resultado) {
        localStorage.setItem('access_token', resultado.access_token)
        window.location.href = './../dashboard/index.html'
    }

})



async function authUser(request) {
    try {
        const response = await fetch('http://127.0.0.1:8000/token',
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(request)
            })
        const data = await response.json()
        return data

    } catch (error) {
        console.log(error)
        return null
    }
}

