const changeQuantity = (btn, num, changeTotal) => {
	let prod = btn.parentNode
	const quantity =  prod.querySelector('[name="quantity"]')
	quantity.value = Number(quantity.value) + num
	if (changeTotal === true) {
		prod = btn.parentNode.parentNode.parentNode
		let  prodSum = quantity.value * prod.querySelector('[data-role="price"]').innerText
		prod.querySelector('[data-role="sum"]').innerText = prodSum.toFixed(2)
		addToCart(prod, num)
	}
}


const addToCart = (btn, quantity) => {
	const prod = btn.parentNode
	const prodData = {
		'function' : 'add',
		'product' :
		{
			'id' : prod.querySelector('[data-role="id"]').innerText,
			'name' : prod.querySelector('[data-role="name"]').innerText,
			'price' : Number(prod.querySelector('[data-role="price"]').innerText),
			'quantity' : (quantity) ? quantity : Number(prod.querySelector('[name="quantity"]').value)
		}
	} 
	ajax(prodData)
	if (!quantity) {
		prod.querySelector('[name="quantity"]').value = 0
	}
}

const delFromCart = (prod) => {
	const prodData = {
		'function' : 'delete',
		'product' : {'id' :  prod.querySelector('[data-role="id"]').innerText}
	}
	ajax(prodData)	
}

const ajax = (prodData) => {
	let response = fetch('cart_functions.php', {
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
	totalElem.innerText = sum.toFixed(2)
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

const addListenerOrder = () => {
	
	const orderBtn = document.getElementById('order')
	orderBtn.addEventListener('click', function () {
		const btnBlock =  document.getElementById('orderFormWrapper')
		btnBlock.style.display = 'block'
	})

	const orderForm = document.getElementById('orderForm')
	orderForm.addEventListener('submit', function(e) {
		e.preventDefault()
		let orderArr = {
			function : 'confirm',
			user : {}
		}
		const inputs = this.getElementsByTagName('input')
		for (let i = 0; i < inputs.length; i++) {
			orderArr['user'][inputs[i].name] = inputs[i].value
		}
		const textarea = this.getElementsByTagName('textarea')
		for (let i = 0; i < textarea.length; i++) {
			orderArr['user'][textarea[i].name] = textarea[i].value
		}

		let response = fetch('cart_functions.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json;charset=utf-8'
			},
			body: JSON.stringify(orderArr)
		})
		.then(function(response) {
			response.json().then(function(data) {
				if (data.code == 'error') {
					const errorBlock = document.getElementById('error')
					let errorString = "Не заповнені поля: "
					data.error.forEach(function() {
						errorString += this + ', '
					})
					errorBlock.innerText = errorString
					errorBlock.style.display = 'block'
				} 
			})
		})
		

	})
}


