<!-- Upload Area -->
<div id="uploadArea" {{ $attributes->merge(['class'=>'upload-area' ]) }}>
    <!-- Header -->
    <div class="upload-area__header">
        <h1 class="upload-area__title">{{$slot}}</h1>
        <p class="upload-area__paragraph">
            File should be an image
            <strong class="upload-area__tooltip">
                Like
                <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
            </strong>
        </p>
    </div>
    <!-- End Header -->

    <!-- Drop Zoon -->
    <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
        <span class="drop-zoon__icon">
            <i class='bx bxs-file-image'></i>
        </span>
        <p class="drop-zoon__paragraph">Drop your file here or Click to browse</p>
        <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
        <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
        <input type="file" id="fileInput" class="drop-zoon__file-input" accept="image/*">
    </div>
    <!-- End Drop Zoon -->

    <!-- File Details -->
    <div id="fileDetails" class="upload-area__file-details file-details">
        <h3 class="file-details__title">Uploaded File</h3>

        <div id="uploadedFile" class="uploaded-file">
            <div class="uploaded-file__icon-container">
                <i class='bx bxs-file-blank uploaded-file__icon'></i>
                <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
            </div>

            <div id="uploadedFileInfo" class="uploaded-file__info">
                <span class="uploaded-file__name">Proejct 1</span>
                <span class="uploaded-file__counter">0%</span>
            </div>
        </div>
    </div>
    <!-- End File Details -->
</div>
<!-- End Upload Area -->

<style>
    /* General Styles */

    * {
        box-sizing: border-box;
    }

    :root {
        --clr-white: rgb(255, 255, 255);
        --clr-black: rgb(0, 0, 0);
        --clr-light: rgb(209 213 219);
        --clr-light-gray: rgb(196, 195, 196);
        --clr-green: #3C8200;
    }

    body {
        margin: 0;
        padding: 0;
        background-color: var(--clr-white);
        color: var(--clr-black);
        font-family: 'Poppins', sans-serif;
        font-size: 1.125rem;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* End General Styles */

    /* Upload Area */
    .upload-area {
        width: 100%;
        background-color: var(--clr-white);
        /* box-shadow: 0 10px 60px var(--clr-light); */
        border: 1px solid var(--clr-light);
        /* border-radius: 12px; */
        padding: 2rem 1.875rem 5rem 1.875rem;
        text-align: center;
    }

    .upload-area--open {
        /* Slid Down Animation */
        animation: slidDown 500ms ease-in-out;
    }

    @keyframes slidDown {
        from {
            height: 28.125rem;
            /* 450px */
        }

        to {
            height: 35rem;
            /* 560px */
        }
    }

    /* Header */
    .upload-area__header {}

    .upload-area__title {
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 0.3125rem;
    }

    .upload-area__paragraph {
        font-size: 0.9375rem;
        color: var(--clr-light-gray);
        margin-top: 0;
    }

    .upload-area__tooltip {
        position: relative;
        color: var(--clr-green);
        cursor: pointer;
        transition: color 300ms ease-in-out;
    }

    .upload-area__tooltip:hover {
        color: var(--clr-green);
    }

    .upload-area__tooltip-data {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -125%);
        min-width: max-content;
        background-color: var(--clr-white);
        color: var(--clr-green);
        border: 1px solid var(--clr-green);
        padding: 0.625rem 1.25rem;
        font-weight: 500;
        opacity: 0;
        visibility: hidden;
        transition: none 300ms ease-in-out;
        transition-property: opacity, visibility;
    }

    .upload-area__tooltip:hover .upload-area__tooltip-data {
        opacity: 1;
        visibility: visible;
    }

    /* Drop Zoon */
    .upload-area__drop-zoon {
        position: relative;
        height: 11.25rem;
        /* 180px */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border: 2px dashed var(--clr-green);
        border-radius: 15px;
        margin-top: 2.1875rem;
        cursor: pointer;
        transition: border-color 300ms ease-in-out;
    }

    .upload-area__drop-zoon:hover {
        border-color: var(--clr-green);
    }

    .drop-zoon__icon {
        display: flex;
        font-size: 3.75rem;
        color: var(--clr-green);
        transition: opacity 300ms ease-in-out;
    }

    .drop-zoon__paragraph {
        font-size: 0.9375rem;
        color: var(--clr-light-gray);
        margin: 0;
        margin-top: 0.625rem;
        transition: opacity 300ms ease-in-out;
    }

    .drop-zoon:hover .drop-zoon__icon,
    .drop-zoon:hover .drop-zoon__paragraph {
        opacity: 0.7;
    }

    .drop-zoon__loading-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
        color: var(--clr-green);
        z-index: 10;
    }

    .drop-zoon__preview-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 0.3125rem;
        border-radius: 10px;
        display: none;
        z-index: 1000;
        transition: opacity 300ms ease-in-out;
    }

    .drop-zoon:hover .drop-zoon__preview-image {
        opacity: 0.8;
    }

    .drop-zoon__file-input {
        display: none;
    }

    /* (drop-zoon--over) Modifier Class */
    .drop-zoon--over {
        border-color: var(--clr-green);
    }

    .drop-zoon--over .drop-zoon__icon,
    .drop-zoon--over .drop-zoon__paragraph {
        opacity: 0.7;
    }

    /* (drop-zoon--over) Modifier Class */
    .drop-zoon--Uploaded {}

    .drop-zoon--Uploaded .drop-zoon__icon,
    .drop-zoon--Uploaded .drop-zoon__paragraph {
        display: none;
    }

    /* File Details Area */
    .upload-area__file-details {
        height: 0;
        visibility: hidden;
        opacity: 0;
        text-align: left;
        transition: none 500ms ease-in-out;
        transition-property: opacity, visibility;
        transition-delay: 500ms;
    }

    /* (duploaded-file--open) Modifier Class */
    .file-details--open {
        height: auto;
        visibility: visible;
        opacity: 1;
    }

    .file-details__title {
        font-size: 1rem;
        font-weight: 500;
        color: var(--clr-light-gray);
    }

    /* Uploaded File */
    .uploaded-file {
        display: flex;
        align-items: center;
        padding: 0.625rem 0;
        visibility: hidden;
        opacity: 0;
        transition: none 500ms ease-in-out;
        transition-property: visibility, opacity;
    }

    /* (duploaded-file--open) Modifier Class */
    .uploaded-file--open {
        visibility: visible;
        opacity: 1;
    }

    .uploaded-file__icon-container {
        position: relative;
        margin-right: 0.3125rem;
    }

    .uploaded-file__icon {
        font-size: 3.4375rem;
        color: var(--clr-green);
    }

    .uploaded-file__icon-text {
        position: absolute;
        top: 1.5625rem;
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.9375rem;
        font-weight: 500;
        color: var(--clr-white);
    }

    .uploaded-file__info {
        position: relative;
        top: -0.3125rem;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .uploaded-file__info::before,
    .uploaded-file__info::after {
        content: '';
        position: absolute;
        bottom: -0.9375rem;
        width: 0;
        height: 0.5rem;
        background-color: #ebf2ff;
        border-radius: 0.625rem;
    }

    .uploaded-file__info::before {
        width: 100%;
    }

    .uploaded-file__info::after {
        width: 100%;
        background-color: var(--clr-green);
    }

    /* Progress Animation */
    .uploaded-file__info--active::after {
        animation: progressMove 800ms ease-in-out;
        animation-delay: 300ms;
    }

    @keyframes progressMove {
        from {
            width: 0%;
            background-color: transparent;
        }

        to {
            width: 100%;
            background-color: var(--clr-green);
        }
    }

    .uploaded-file__name {
        width: 100%;
        max-width: 6.25rem;
        /* 100px */
        display: inline-block;
        font-size: 1rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .uploaded-file__counter {
        font-size: 1rem;
        color: var(--clr-light-gray);
    }
</style>


