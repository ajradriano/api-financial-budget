
    function swalSuccess(message) {
        Swal.fire("Saved!", message, "success");
    }

    function swalError(message) {
        Swal.fire("Error!", message, "error");
    }

    function swalWarning(message) {
        Swal.fire("Warning!", message, "warning");
    }

    function swalInfo(message) {
        Swal.fire("Info!", message, "info");
    }

    function swalConfirm(message) {
        Swal.fire({
            title: "Are you sure?",
            text: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.isConfirmed) {
                Swal.fire("Deleted!", message, "success");
            }
        });
    }
