var myImage = document.getElementById('test');
alert myImage
myImage.onclick = function () {
	var mySrc = myImage.getAttribute('src');
	if(mySrc === 'images/admin.png') {
		myImage.src = '../images/pres.png';
	} else {
		myImage.setAttribute ('src','../images/admin.png');
	}
