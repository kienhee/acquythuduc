function formatDate(inputDateString) {
    const months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];

    const inputDate = new Date(inputDateString);

    const monthIndex = inputDate.getUTCMonth();
    const monthAbbreviation = months[monthIndex];

    const day = inputDate.getUTCDate();
    const year = inputDate.getUTCFullYear();

    const formattedDate = monthAbbreviation + " " + day + ", " + year;

    return formattedDate;
}
