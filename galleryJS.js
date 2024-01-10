var imageDragDrops = document.body.querySelectorAll(".gallery_display_item");
// console.log("how many drag and drops? " + imageDragDrops.length);
for (var index = 0; index < imageDragDrops.length; index++) {
    // console.log("index? " + index);
    (function (index) {
        var imageDragDrop = imageDragDrops[index];
        imageDragDrop.addEventListener('dragover', function (e) {
            e.preventDefault();
        });

        imageDragDrop.addEventListener('dragenter', function (e) {
            e.preventDefault();
            imageDragDrop.style.border = '4px solid lavender';
        });

        imageDragDrop.addEventListener('dragleave', function (e) {
            e.preventDefault();
            imageDragDrop.style.border = 'none';
        });

        imageDragDrop.addEventListener('drop', function (e) {
            e.preventDefault();
            imageDragDrop.style.border = 'none';
            var files = e.dataTransfer.files;
            if (files.length > 0) {
                console.log("files.length > 0 " + "local");
                for (var i = 0; i < files.length; i++) {
                    if (files[i].type.startsWith('image/')) {
                        console.log('An image has been dropped', files[i].name);
                        imageDragDrop.src = URL.createObjectURL(files[i]);
                        URL.revokeObjectURL(imageDragDrop.src)
                    } else {
                        alert('Only image can be dropped!');
                        break;
                    }
                }
            }
        });
    })(index);
}
