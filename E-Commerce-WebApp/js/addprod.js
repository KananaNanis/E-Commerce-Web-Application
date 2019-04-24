function validate(form) {
    if (form.title.value == "") {
        alert("Product title cannot be blank!");
        form.title.focus();
        return false;
    }


    if (form.brand.value == "") {
        alert("Enter Brand Name!");
        form.brand.focus();
        return false;
    }
    if (form.price.value == "") {
        alert("Enter Price of Product!");
        form.price.focus();
        return false;
    }
    if (form.picture.value == "") {
        alert("Upload an image!");
        form.price.focus();
        return false;
    }
    if (form.description.value == "") {
        alert("Enter Product Description!");
        form.description.focus();
        return false;
    }

    if (isNaN(form.price.value)) {
        alert("Price value is invalid!");
        form.price.focus();
        return false;
    }
    var e = document.getElementById("category");
    var optionSelIndex = e.options[e.selectedIndex].value;
    var optionSelectedText = e.options[e.selectedIndex].text;
    if (optionSelIndex == 0) {
        alert("Please select Category!");
        form.category.focus();
        return false;
    }

    var b = document.getElementById("brand");
    var optionSelIndex = b.options[b.selectedIndex].value;
    var optionSelectedText = b.options[e.selectedIndex].text;
    if (optionSelIndex == 0) {
        alert("Please select Brand!");
        form.brand.focus();
        return false;
    }

}
function register(form) {
    if (form.phn.value.length != 10) {
        alert("Phone number should contain 10 digits!");
        return false;
    }
    if (form.pword.value.length.length < 8) {
        alert("Password Cannot Contain less than 8 characters");
        return false;
    }

    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
}

function reg_validate(form) {

    if (form.name.value == "") {
        alert("Error: Name cannot be blank!");
        form.name.focus();
        return false;
    }
    var letters = /^[A-Za-z]+$/;
    if (!letters.test(form.name.value)) {
        alert("Error: Name must contain alphabets only!");
        form.name.focus();
        return false;
    }
    if (form.password.value == "") {
        alert("Error: Password cannot be blank!");
        form.password.focus();
        return false;
    }
    if (form.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password.focus();
        return false;
    }
    var passtest = /[A-Z]/;
    if (!passtest.test(form.password.value)) {
        alert("Error: Password must contain at least one uppercase letter (A-Z)!");
        form.password.focus();
        return false;
    }
    var re = /[0-9]/;
    if (!re.test(form.password.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.password.focus();
        return false;
    }
    var symbol = /[!@#$%^&*]/;
    if (!symbol.test(form.password.value)) {
        alert("Error: password must contain at least one symbol!");
        form.password.focus();
        return false;
    }
    if (form.country.value == "") {
        alert("Error: Country cannot be blank!");
        form.country.focus();
        return false;
    }
    if (!letters.test(form.country.value)) {
        alert("Error: Country must contain alphabets only!");
        form.country.focus();
        return false;
    }
    if (form.city.value == "") {
        alert("Error: City cannot be blank!");
        form.city.focus();
        return false;
    }
    if (!letters.test(form.city.value)) {
        alert("Error: City must contain alphabets only!");
        form.city.focus();
        return false;
    }
    if (form.contact.value == "") {
        alert("Error: Phone number cannot be blank!");
        form.contact.focus();
        return false;
    }
    var numbers = /^[0-9]+$/;
    if (!numbers.test(form.contact.value)) {
        alert("Error: Phone Number must have numeric characters only!");
        form.contact.focus();
        return false;
    }
    if (form.contact.value.length < 10 || form.contact.value.length > 10) {
        alert("Error: Phone number must be 10 numbers !");
        form.contact.focus();
        return false;
    }
    if (form.email.value == "") {
        alert("Error: Email address cannot be blank!");
        form.email.focus();
        return false;
    }
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!mailformat.test(form.email.value)) {
        alert("Error: You have entered an invalid email address!");
        form.email.focus();
        return false;
    }

    if (form.address.value == "") {
        alert("Error:Address cannot be blank!");
        form.address.focus();
        return false;
    }
    var add = /^[0-9a-zA-Z]+$/;
    if (!add.test(form.address.value)) {
        alert("Error: User address must have alphanumeric characters only!");
        form.address.focus();
        return false;
    }


}

var count = 0;
function add() {
    count += 1;
    document.getElementById("mycart").innerHTML = count;
}