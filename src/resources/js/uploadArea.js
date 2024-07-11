// resources/js/UploadArea.js

class UploadArea {
    constructor(uploadAreaElement) {
        this.uploadArea = uploadAreaElement;
        this.dropZoon = this.uploadArea.querySelector('.drop-zoon');
        this.loadingText = this.uploadArea.querySelector('.drop-zoon__loading-text');
        this.fileInput = this.uploadArea.querySelector('.drop-zoon__file-input');
        this.previewImage = this.uploadArea.querySelector('.drop-zoon__preview-image');
        this.fileDetails = this.uploadArea.querySelector('.upload-area__file-details');
        this.uploadedFile = this.uploadArea.querySelector('.uploaded-file');
        this.uploadedFileInfo = this.uploadArea.querySelector('.uploaded-file__info');
        this.uploadedFileName = this.uploadArea.querySelector('.uploaded-file__name');
        this.uploadedFileIconText = this.uploadArea.querySelector('.uploaded-file__icon-text');
        this.uploadedFileCounter = this.uploadArea.querySelector('.uploaded-file__counter');
        this.toolTipData = this.uploadArea.querySelector('.upload-area__tooltip-data');
        this.imagesTypes = ["jpeg", "png", "svg"];

        this.toolTipData.innerHTML = [...this.imagesTypes].join(', .');
        this.initialize();
    }

    initialize() {
        this.dropZoon.addEventListener('dragover', (event) => this.handleDragOver(event));
        this.dropZoon.addEventListener('dragleave', (event) => this.handleDragLeave(event));
        this.dropZoon.addEventListener('drop', (event) => this.handleDrop(event));
        this.dropZoon.addEventListener('click', (event) => this.handleClick(event));
        this.fileInput.addEventListener('change', (event) => this.handleFileChange(event));
    }

    handleDragOver(event) {
        event.preventDefault();
        this.dropZoon.classList.add('drop-zoon--over');
    }

    handleDragLeave(event) {
        this.dropZoon.classList.remove('drop-zoon--over');
    }

    handleDrop(event) {
        event.preventDefault();
        this.dropZoon.classList.remove('drop-zoon--over');
        const file = event.dataTransfer.files[0];
        this.uploadFile(file);
    }

    handleClick(event) {
        this.fileInput.click();
    }

    handleFileChange(event) {
        const file = event.target.files[0];
        this.uploadFile(file);
    }

    uploadFile(file) {
        const fileReader = new FileReader();
        const fileType = file.type;
        const fileSize = file.size;

        if (this.fileValidate(fileType, fileSize)) {
            this.dropZoon.classList.add('drop-zoon--Uploaded');
            this.loadingText.style.display = "block";
            this.previewImage.style.display = 'none';
            this.uploadedFile.classList.remove('uploaded-file--open');
            this.uploadedFileInfo.classList.remove('uploaded-file__info--active');

            fileReader.addEventListener('load', () => {
                setTimeout(() => {
                    this.uploadArea.classList.add('upload-area--open');
                    this.loadingText.style.display = "none";
                    this.previewImage.style.display = 'block';
                    this.fileDetails.classList.add('file-details--open');
                    this.uploadedFile.classList.add('uploaded-file--open');
                    this.uploadedFileInfo.classList.add('uploaded-file__info--active');
                }, 500);

                this.previewImage.setAttribute('src', fileReader.result);
                this.uploadedFileName.innerHTML = file.name;
                this.progressMove();
            });

            fileReader.readAsDataURL(file);
        }
    }

    progressMove() {
        let counter = 0;
        setTimeout(() => {
            let counterIncrease = setInterval(() => {
                if (counter === 100) {
                    clearInterval(counterIncrease);
                } else {
                    counter += 10;
                    this.uploadedFileCounter.innerHTML = `${counter}%`;
                }
            }, 100);
        }, 600);
    }

    fileValidate(fileType, fileSize) {
        let isImage = this.imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

        if (isImage[0] === 'jpeg') {
            this.uploadedFileIconText.innerHTML = 'jpg';
        } else {
            this.uploadedFileIconText.innerHTML = isImage[0];
        }

        if (isImage.length !== 0) {
            if (fileSize <= 5000000) {
                return true;
            } else {
                alert('Please Your File Should be 5 Megabytes or Less');
                return false;
            }
        } else {
            alert('Please make sure to upload An Image File Type');
            return false;
        }
    }
}

export default UploadArea;