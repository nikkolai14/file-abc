(function() {
    Dropzone.options.uploadFileForm = {
        maxFiles: 1,
        acceptedFiles: "image/png, image/jpeg, image/jpg, application/pdf",
        success: function(file, response) {
            const className = response.success === true ? 
                "bg-success bg-gradient" :
                "bg-danger bg-gradient";

            Toastify({
                text: response.message,
                className,
                duration: 3000,
                stopOnFocus: true,
                destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center",
                callback: function() {
                    window.location.href = "/image-editor.php?id=" + response.file_id + "&step=1";
                }
            }).showToast();
        }
    };

    $('#image-convert-select-ouput').on('change', function() {
        const value = $(this).val();

        $('#image-convert-select-output-badge').html(value);
    });
})();