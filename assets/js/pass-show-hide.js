
const pswField = document.querySelector(".form form .input input[type='password']"),
		togglebtn = document.querySelector(".form .input p");

togglebtn.onclick = ()=>{
	if(pswField.type == 'password'){
		pswField.type = 'text';
	}else{
		pswField.type = 'password';
	}
}	