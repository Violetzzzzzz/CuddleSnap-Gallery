var newAlbumButton = document.body.querySelector("#add_album");
if (newAlbumButton !== null) {
	newAlbumButton.addEventListener('click', async function () {
		let albumsContainer = document.getElementById('albums_container');
		let addAlbumContainer = document.getElementById('new_album_form');
		albumsContainer.style.display = 'none';
		addAlbumContainer.style.display = 'flex';
		addAlbumContainer.style.flexDirection = 'column';
		addAlbumContainer.style.textAlign = 'center';
		addAlbumContainer.style.alignItems = 'center';
	});
} else {
	console.log("Element(#add_album) can't be found (display might be none)");
}

var cancelAlbumButton = document.body.querySelector("#cancel_album_form");
cancelAlbumButton.addEventListener('click', async function () {
	let albumsContainer = document.getElementById('albums_container');
	let addAlbumContainer = document.getElementById('new_album_form');
	albumsContainer.style.display = 'flex';
	addAlbumContainer.style.display = 'none';
});

