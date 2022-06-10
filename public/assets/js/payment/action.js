//update balance page
$("#updateBalanceBtn").on("click", function (e) {
    e.preventDefault();

    var userID = document.getElementById("userID").value;
    var deposite = document.getElementById("depositAmt").value;
    var adminID = document.getElementById("adminID").value;

    if (userID.length == 0 || deposite.length == 0) {
        new Swal("Error", "UserID or Deposit field is required", "error");
        return false;
    } else {
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/api/payment/updateBalance",
            type: "POST",
            headers: {
                Accept: "application/json",
            },
            data: {
                userID: userID,
                depositAmt: deposite,
                adminID: adminID,
            },
            dataType: "json",

            success: function (data) {
                new swal(
                    "Success!",
                    "Deposited RM" + deposite + " to user: " + userID,
                    "success"
                );
            },
            error: function (xhr, status, error) {
                new swal("Error", xhr.responseText, "error");
            },
        });
    }
});

//payment summary page
$("#paymentSummaryBtn").on("click", function (e) {
    const jsonData = document.getElementById("paymentSummaryData").value;

    const paymentData = JSON.parse(jsonData);

    if (paymentData.userID == null) {
        new Swal("Error", "UserID is required", "error");
        return false;
    } else {
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/api/payment/create",
            type: "POST",
            headers: {
                Accept: "application/json",
            },
            data: {
                userID: paymentData.userID,
                tournamentID: paymentData.tournamentID,
                trainingID: paymentData.trainingID,
                paymentDate: new Date().toLocaleDateString(),
            },
            dataType: "json",
            beforeSend: function () {
                Swal.fire({
                    title: "Loading",
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });
            },
            success: function (data) {
                new swal("Success!", "Paid Successfully!", "success");
            },
            error: function (xhr, status, error) {
                new swal("Error", xhr.responseText, "error");
            },
        });
    }
});

$(document).ready(function() {
    console.log('called');
    const summaryTableElement = document.getElementById("paymentStatusTable");

    if (summaryTableElement != null || summaryTableElement == 'undefined') {
        const userID = document.getElementById("userID").value;
        const base_url = window.location.origin;
        console.log(userID);
        $.ajax({
            url: base_url + "/api/payment/transaction",
            type: "GET",
            headers: {
                Accept: "application/json",
            },
            data: {
                userID: userID,
            },
            dataType: "json",
            beforeSend: function () {
                Swal.fire({
                    title: "Loading",
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });
            },
            success: function (data) {
                Swal.close();
                for (let index = 0; index < data.length; index++) {
                    const transaction = data[index];
                    createTableData(transaction);
                }
            },
            error: function (xhr, status, error) {
                new swal("Error", xhr.responseText, "error");
            },
        });
    }
});

function createTableData(transaction) {
    const summaryTableElement = document.getElementById("paymentStatusTable");
    const element = '<tr><td>'+transaction.userID+'</td><td>'+transaction.paymentDate+'</td><td>'+transaction.type+'</td><td>RM '+transaction.paidAmount+'</td> <td></td><td><button name="status" type="button" class="btn btn-success"><strong>'+transaction.paymentStatus+'</strong></button></td></tr>';

    summaryTableElement.insertAdjacentHTML('beforebegin', element);
}
