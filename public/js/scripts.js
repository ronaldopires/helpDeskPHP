$(document).ready(function () {
    //Toast
    // const toastTrigger = document.getElementById('liveToastBtn')
    // const toastLiveExample = document.getElementById('liveToast')
    // if (toastTrigger) {
    //   toastTrigger.addEventListener('click', () => {
    //     const toast = new bootstrap.Toast(toastLiveExample)

    //     toast.show()
    //   })
    // }

    //Data Tables
    if (
        window.location.href.toString().split(window.location.host)[1] ==
        "/chamados"
    ) {
        let request = $("#table-request").DataTable({
            dom: "Bfrtip",
            order: [[0, "desc"]],
            lengthChange: false,
            responsive: true,
            buttons: [
                {
                    extend: "excel",
                    split: ["pdf", "csv"],
                },
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json",
            },
        });
        request
            .buttons()
            .container()
            .appendTo("#example_wrapper .col-md-6:eq(0)");
    }
    if (
        window.location.href.toString().split(window.location.host)[1] ==
        "/meus-chamados"
    ) {
        let my_request = $("#table-my-request").DataTable({
            lengthChange: false,
            dom: "Bfrtip",
            order: [[0, "desc"]],
            responsive: true,
            buttons: [
                {
                    extend: "excel",
                    split: ["pdf", "csv"],
                },
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json",
            },
        });
        my_request
            .buttons()
            .container()
            .appendTo("#example_wrapper .col:eq(0)");
    }

    // Valitation form create requests
    (() => {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.from(forms).forEach((form) => {
            form.addEventListener(
                "submit",
                (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add("was-validated");
                },
                false
            );
        });
    })();

    if (document.getElementById("validate-toast")) {
        const toastNewRquest = document.getElementById("liveToast");
        const toast = new bootstrap.Toast(toastNewRquest);
        toast.show();
    }

    const modalTutorial = new bootstrap.Modal("#tutorial", {
        keyboard: false,
    });
    // modalTutorial.show();
});
