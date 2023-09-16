$("#btn-acceder").click(function (e) {
    e.preventDefault();
    const request = {
        correo: $("#correo").val(),
        password: $("#password").val()
    }

    $.ajax({
        url: 'http://127.0.0.1:8000/token',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(request),
        success: function (response) {
            window.location.href = './../dashboard'
        },
        error: function (error) {
            console.log(error)
        }
    })
})
