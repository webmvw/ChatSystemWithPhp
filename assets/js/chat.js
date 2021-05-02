
const form = document.querySelector('.typing-area'),
	inputField = form.querySelector('.input-field'),
	sendBtn = form.querySelector('button'),
	chatBox = document.querySelector('.chat-box');

form.onsubmit = (e)=>{
	e.preventDefault(); //preventing form from submitting
}

sendBtn.onclick = ()=>{
	// let start ajax
	let xhr = new XMLHttpRequest(); //creating XML object
	xhr.open("POST", "lib/insert-chat.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				inputField.value = "";
			}
		}
	}
	// we have to send the form data through ajax to php
	let formData = new FormData(form); //creating new formData Object
	xhr.send(formData); //sending from data to php
}


setInterval(()=>{
	// let start ajax
	let xhr = new XMLHttpRequest(); //creating XML object
	xhr.open("POST", "lib/get-chat.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				chatBox.innerHTML = data;
			}
		}
	}
	// we have to send the form data through ajax to php
	let formData = new FormData(form); //creating new formData Object
	xhr.send(formData); //sending from data to php
}, 500);
