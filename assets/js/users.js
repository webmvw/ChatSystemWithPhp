
const searchBar = document.querySelector('.users .search input'),
	  searchBtn = document.querySelector('.users .search button'),
	  userList = document.querySelector('.users-list');

searchBtn.onclick = ()=>{
	searchBar.classList.toggle('active');
	searchBtn.classList.toggle('active');
}


searchBar.onkeyup = ()=>{
	let searchTerm = searchBar.value;
	if(searchTerm != ''){
		searchBar.classList.add('active');
	}else{
		searchBar.classList.remove('active');
	}
	// let start ajax
	let xhr = new XMLHttpRequest(); //creating XML object
	xhr.open("POST", "lib/search.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				userList.innerHTML = data;
			}
		}
	}
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.send('searchTerm=' + searchTerm);
}





setInterval(()=>{
	// let start ajax
	let xhr = new XMLHttpRequest(); //creating XML object
	xhr.open("GET", "lib/users.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				if(!searchBar.classList.contains('active')){
					userList.innerHTML = data;
				}
			}
		}
	}
	xhr.send();
}, 500);