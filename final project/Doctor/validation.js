// validation.js

document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("registrationForm");

    form.addEventListener("submit", function (event) {
        var isValid = validateForm();

        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting if validation fails
        }
    });

    function validateForm() {
        var doctorname = document.getElementById("doctorname").value;
        var mobileno = document.getElementById("mobileno").value;
        var departmentid = document.getElementById("departmentid").value;
        var loginid = document.getElementById("loginid").value;
        var password = document.getElementById("password").value;
        var status = document.getElementById("status").value;
        var education = document.getElementById("education").value;
        var experience = document.getElementById("experience").value;
        var consultancyCharge = document.getElementById("consultancy_charge").value;

        if (doctorname === "" || mobileno === "" || departmentid === "" || loginid === "" || password === "" || status === "" || education === "" || experience === "" || consultancyCharge === "") {
            alert("All fields are required");
            return false;
        }

        // Add more specific validation if needed

        return true;
    }
});
