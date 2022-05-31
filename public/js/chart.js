$(document).ready(function () {
    function date() {
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, "0");
        let mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
        let yyyy = today.getFullYear();
        return (today = dd + "/" + mm + "/" + yyyy);
    }

    if (window.location.href.toString().split(window.location.host)[1] == "/") {
        const ticketsForDay = document
            .getElementById("tickets-for-day")
            .getContext("2d");
        const ticketsForYear = document
            .getElementById("tickets-for-year")
            .getContext("2d");
        const ticketForWeek = document
            .getElementById("tickets-for-week")
            .getContext("2d");

        const chartDay = new Chart(ticketsForDay, {
            type: "line",
            data: {
                labels: [
                    "0hs",
                    "1hs",
                    "2hs",
                    "3hs",
                    "4hs",
                    "5hs",
                    "6hs",
                    "7hs",
                    "8hs",
                    "9hs",
                    "10hs",
                    "11hs",
                    "12hs",
                    "14hs",
                    "15hs",
                    "16hs",
                    "17hs",
                    "18hs",
                    "19hs",
                    "20hs",
                    "21hs",
                    "22hs",
                    "23hs",
                ],
                datasets: [
                    {
                        label: `Chamados em ${date()}`,
                        data: [
                            0, 0, 0, 0, 0, 1, 2, 3, 5, 2, 4, 8, 5, 10, 25, 2, 1,
                            1, 0, 0, 0, 0, 0, 0,
                        ],
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            responsive: true,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        const chartWeek = new Chart(ticketForWeek, {
            type: "bar",
            data: {
                labels: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"],
                datasets: [
                    {
                        label: "Chamados da Semana",
                        data: [15, 18, 35, 12, 5],
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
        const chartYear = new Chart(ticketsForYear, {
            type: "bar",
            data: {
                labels: [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro",
                ],
                datasets: [
                    {
                        label: "Chamados em " + new Date().getFullYear(),
                        data: [
                            50, 70, 90, 110, 130, 150, 180, 210, 240, 270, 350,
                            450,
                        ],
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    }
});
