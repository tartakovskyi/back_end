const changeQuantity = (btn, num, changeTotal) => {
	let prod = btn.parentNode
	const quantity =  prod.querySelector('[name="quantity"]')
	quantity.value = Number(quantity.value) + num
	if (changeTotal) {
		prod = btn.parentNode.parentNode.parentNode
		addToCart(prod, num)
	}
}


const addToCart = (btn, quantity) => {
	const prod = btn.parentNode
	const prodData = {
		'function' : 'add',
		'product' :
		{
			'id' : prod.id,
			'name' : prod.querySelector('[data-role="name"]').innerText,
			'price' : Number(prod.querySelector('[data-role="price"]').innerText),
			'quantity' : (quantity) ? quantity : Number(prod.querySelector('[name="quantity"]').value)
		}
	} 	
	ajax(prodData)
}

const delFromCart = (prod) => {
	const prodData = {
		'function' : 'delete',
		'product' : {'id' :  prod.querySelector('[data-role="id"]').innerText}
	}
	ajax(prodData)	
}

const ajax = (prodData) => {
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
		})
	})
}

const changeTotal = (sum) => {
	const totalElem = document.getElementById('total')
	totalElem.innerText = sum
}

const addListenerDelProd = () => {
	const delBtns = document.getElementsByClassName('del')
	for (var i = 0; i < delBtns.length; i++) {
		let del = delBtns[i]
		del.addEventListener('click', function (e) {
			e.preventDefault()
			const prod = this.parentNode.parentNode
			const prodId = prod.querySelector('td').innerText
			delFromCart(prod)
			prod.remove()
		})
	}
}
