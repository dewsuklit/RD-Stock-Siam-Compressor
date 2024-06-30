let list = document.querySelectorAll(".navigation li");

function activelink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach(item => item.addEventListener("mouseover", activelink));

/*---------- Menu toggle ----------*/
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}





const form = document.querySelector("#formUpload"),
    fileInput = form.querySelector(".file-input"),
    progressArea = document.querySelector(".progress-area"),
    uploadedArea = document.querySelector(".uploaded-area");
    
form.addEventListener("click", () => {
    fileInput.click();
});


fileInput.onchange = ({target}) => {
    let file = target.files[0];
    if (file) {
        let fileName = file.name;
        if (fileName.length >= 12) {
            let splitName = fileName.split('.');
            fileName = splitName[0].substring(0, 12) + "... ." + splitName[1];
        }
        uploadFile(fileName);
    }
}

function uploadFile(name) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php");
    xhr.upload.addEventListener("progress", ({ loaded, total }) => {
        let fileLoaded = Math.floor((loaded / total) * 100);
        let fileTotal = Math.floor(total / 1000);
        let fileSize;
        (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
        let progressHTML = `<li class="rowUpload">
                                <i class="fas fa-file-alt"></i>
                                <div class="content">
                                    <div class="detailsUp">
                                        <span class="name">${name}   •  Uploading</span>
                                        <span class="percent">${fileLoaded}%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress" style="width: ${fileLoaded}%"></div>
                                    </div>
                                </div>
                            </li>`;

        uploadedArea.classList.add("onprogress");
        progressArea.innerHTML = progressHTML;

        if (loaded == total) {
            progressArea.innerHTML = "";
            let uploadedHTML = `<li class="rowUpload">     
                                <div class="content">
                                    <i class="fas fa-file-alt"></i>
                                    <div class="detailsUp">
                                        <span class="name">${name}   •  Uploaded</span>
                                        <span class="size">${fileSize}</span>
                                    </div>
                                </div>
                                <i class="fas fa-check"></i> 
                            </li>`;
            uploadedArea.classList.remove("onprogress");
            uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
        }
    });
    let formData = new FormData(form);
    xhr.send(formData);
}


//-------------- script popup --------------//

function showPopup() {
    let popup = document.getElementById('popup');
    let menuBox = document.getElementById('menubox');
    if (popup.style.display === 'none') {
        popup.style.display = 'grid';
        menuBox.style.display = 'none';
    }
}

function closePopup() {
    let popup = document.getElementById('popup2');
    if (popup.style.display === 'grid') {
        popup.style.display = 'none';
    }
}

function showPopupQr() {
    let popup = document.getElementById('popup');
    if (popup.style.display === 'none') {
        popup.style.display = 'grid';
    }
}

function closePopupQr() {
    let popup = document.getElementById('popup');
    if (popup.style.display === 'grid') {
        popup.style.display = 'none';
    }
}



function viewAll() {
    let mytable = document.getElementById('myTable');
    if (mytable.style.display === 'none') {
        mytable.style.display = 'table';
    }
}



function clearbtn() {
    window.location.href='qr.php';
}
function clearbtnOut() {
    window.location.href='qr_out.php';
}



