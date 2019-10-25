const changeQuantity = (btn, num) => {
	const prod = btn.parentNode
	const quantity =  prod.querySelector('[name="quantity"]')
	quantity.value = Number(quantity.value) + num
}


const addToCart = (btn) => {
	const prod = btn.parentNode
	const prodData = 
	{
		'id' : prod.id,
		'name' : prod.querySelector('[data-role="name"]').innerText,
		'price' : Number(prod.querySelector('[data-role="price"]').innerText),
		'quantity' : Number(prod.querySelector('[name="quantity"]').value)
	}
	let response = fetch('addtocart.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify(prodData)
	})
	.then(function(response) {
		response.json().then(function(data) {  
			changeTotal(data)
		});  

	})

	const changeTotal = (sum) => {
		const totalElem = document.getElementById('total')
		totalElem.innerText = sum
	}
}