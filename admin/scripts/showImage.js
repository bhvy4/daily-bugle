const image = document.getElementById("file-ip-1");

image.addEventListener('change',e =>{
	console.log(e.target.files);
	if(e.target.files.length > 0){
		let src = URL.createObjectURL(e.target.files[0]);
		let preview = document.getElementById("file-ip-1-preview");
		preview.src = src;
		preview.style.display = "block";
	}
})