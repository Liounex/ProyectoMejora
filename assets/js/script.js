paypal.Buttons({
    style:{
        color: 'blue',
        shape: 'pill',
        label: 'pay'
    },
    createOrder: function(data, actions){
        return actions.order.create({
           purchase_units: [{
            amount: { value: 100, currency: 'USD'}
           }] 
        });
    },
    onApprove: function(data, actions){
        actions.order.capture().then(function (detalles){
            window.location.href="completado.php"
        });
    },

    
    onCancel: function(data){
        alert('pago cancelado');
        console.log(data)
    }
}).render('#paypal-button-container');