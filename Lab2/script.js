function validateForm() {
  let isValid = true;

  document.getElementById("nameError").innerText = "";
  document.getElementById("emailError").innerText = "";
  document.getElementById("passwordError").innerText = "";
  document.getElementById("confirmPasswordError").innerText = "";
  document.getElementById("successMessage").innerText = "";

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;

  if (name === "") {
    document.getElementById("nameError").innerText = "Name is required.";
    isValid = false;
  }

  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (email === "") {
    document.getElementById("emailError").innerText = "Email is required.";
    isValid = false;
  } else if (!emailPattern.test(email)) {
    document.getElementById("emailError").innerText = "Invalid email format.";
    isValid = false;
  }

  if (password.length < 6) {
    document.getElementById("passwordError").innerText =
      "Password must be at least 6 characters.";
    isValid = false;
  }

  if (confirmPassword !== password) {
    document.getElementById("confirmPasswordError").innerText =
      "Passwords do not match.";
    isValid = false;
  }

  if (isValid) {
    alert("Registration Successful!");
  }

  return isValid;
}
