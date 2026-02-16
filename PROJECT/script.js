

function showLogin() {
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("registerForm").style.display = "none";
}

function showRegister() {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "block";
}

// ---------------------------
// LOGIN FORM HANDLING
// ---------------------------

document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let email = this.email.value;
    let password = this.password.value;

    if (email === "" || password === "") {
        alert("All fields are required!");
        return;
    }

    alert("Login Successful! Welcome back to Cold Coffee Shop ☕");
    this.reset();
});

// ---------------------------
// REGISTER FORM HANDLING
// ---------------------------

document.getElementById("registerForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let name = this.name.value;
    let email = this.email.value;
    let password = this.password.value;

    if (name === "" || email === "" || password === "") {
        alert("All fields are required!");
        return;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long!");
        return;
    }

    alert("Registration Successful! You can now login ☕");
    this.reset();
    showLogin();   // Switch to login after register
});
